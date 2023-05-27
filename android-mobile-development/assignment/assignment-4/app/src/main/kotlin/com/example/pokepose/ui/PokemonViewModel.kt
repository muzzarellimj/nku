package com.example.pokepose.ui

import android.util.Log
import androidx.lifecycle.SavedStateHandle
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.example.pokepose.data.model.NamedResource
import com.example.pokepose.data.model.NamedResourceResponse
import com.example.pokepose.data.repository.PokeApiRepository
import dagger.hilt.android.lifecycle.HiltViewModel
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.StateFlow
import kotlinx.coroutines.launch
import javax.inject.Inject

@HiltViewModel
class PokemonViewModel @Inject constructor(
    private val pokeApiRepository: PokeApiRepository,
    state: SavedStateHandle
) : ViewModel() {
    private val id: Int = state["id"] ?: 0

    private var _pokemonState = MutableStateFlow<PokemonState>(PokemonState.Fetching)
    val pokemonState: StateFlow<PokemonState> = _pokemonState

    init {
        fetch(id)
    }

    private fun fetch(id: Int?) {
        _pokemonState.value = PokemonState.Fetching

        Log.i("PokemonViewModel", "#fetch($id)")

        viewModelScope.launch {
            when (val response = pokeApiRepository.fetchPokemon(id)) {
                is NamedResourceResponse.Success -> _pokemonState.value = PokemonState.Success(response.resource)
                else -> _pokemonState.value = PokemonState.Failure
            }
        }
    }
}

sealed class PokemonState {
    data class Success(
        val resource: NamedResource? = null
    ): PokemonState()

    object Fetching : PokemonState()
    object Failure : PokemonState()
}