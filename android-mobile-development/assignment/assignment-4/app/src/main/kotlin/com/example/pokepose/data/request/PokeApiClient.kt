package com.example.pokepose.data.request

import com.example.pokepose.data.model.PageableResource
import com.example.pokepose.data.model.pokemon.Pokemon
import retrofit2.Response
import retrofit2.http.GET
import retrofit2.http.Path
import retrofit2.http.Query

interface PokeApiClient {

    @GET("pokemon/")
    suspend fun fetchPokedex(
        @Query("offset") offset: Int? = 0,
        @Query("limit") limit: Int? = 20
    ): Response<PageableResource>

    @GET("pokemon/{id}/")
    suspend fun fetchPokemon(
        @Path("id") id: Int? = 1
    ): Response<Pokemon>
}