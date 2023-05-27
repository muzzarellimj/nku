package com.example.pokepose.ui

import android.util.Log
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.example.pokepose.data.model.PageableResource
import com.example.pokepose.data.model.PageableResourceResponse
import com.example.pokepose.data.model.ResourceDescriptor
import com.example.pokepose.data.repository.PokeApiRepository
import dagger.hilt.android.lifecycle.HiltViewModel
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.StateFlow
import kotlinx.coroutines.launch
import javax.inject.Inject

@HiltViewModel
class PokedexViewModel @Inject constructor(
    private val pokeApiRepository: PokeApiRepository
) : ViewModel() {
    private var _pokedexState = MutableStateFlow<PokedexState>(PokedexState.Fetching)
    val pokedexState: StateFlow<PokedexState> = _pokedexState

    init {
        fetch()
    }

    private fun fetch() {
        _pokedexState.value = PokedexState.Fetching

        Log.i("PokedexViewModel", "#fetch")

        viewModelScope.launch {
            when (val response = pokeApiRepository.fetchPokedex()) {
                is PageableResourceResponse.Success -> {
                    if (response.pageable?.results !== null) {
                        for (resource in response.pageable.results) {
                            resource.id = extractId(resource)
                            resource.sprite = formatSpritePath(resource.id)
                        }

                        _pokedexState.value = PokedexState.Success(response.pageable)

                    } else {
                        _pokedexState.value = PokedexState.Failure
                    }

                    _pokedexState.value = PokedexState.Success(response.pageable)
                }

                else -> _pokedexState.value = PokedexState.Failure
            }
        }
    }

    private fun extractId(resource: ResourceDescriptor): Int? {
        val pattern: Regex = "(?<![a-z])\\d+".toRegex()

        return pattern.find(resource.url)?.value?.toIntOrNull()
    }

    private fun formatSpritePath(id: Int?): String {
        return when (id !== null) {
            true -> "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/$id.png"
            else -> "https://raw.githubusercontent.com/muzzarellimj/android-mobile-development/main/assignment/assignment-4/data/question.png"
        }
    }
}

sealed class PokedexState {
    data class Success(
        val pageable: PageableResource? = null
    ) : PokedexState()

    object Fetching : PokedexState()
    object Failure: PokedexState()
}