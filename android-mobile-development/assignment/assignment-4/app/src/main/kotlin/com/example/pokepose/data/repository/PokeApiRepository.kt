package com.example.pokepose.data.repository

import com.example.pokepose.data.model.NamedResourceResponse
import com.example.pokepose.data.model.PageableResourceResponse

interface PokeApiRepository {

    suspend fun fetchPokedex(
        offset: Int? = null,
        limit: Int? = null
    ): PageableResourceResponse

    suspend fun fetchPokemon(
        id: Int? = null
    ): NamedResourceResponse
}