package com.example.pokepose.data.repository

import com.example.pokepose.data.model.NamedResourceResponse
import com.example.pokepose.data.model.PageableResource
import com.example.pokepose.data.model.PageableResourceResponse
import com.example.pokepose.data.model.pokemon.Pokemon
import com.example.pokepose.data.request.PokeApiClient
import javax.inject.Inject

class PokeApiRepositoryImpl @Inject constructor(
    private val client: PokeApiClient
) : PokeApiRepository {

    override suspend fun fetchPokedex(offset: Int?, limit: Int?): PageableResourceResponse {
        val response = client.fetchPokedex(offset, limit)

        if (!response.isSuccessful) {
            return PageableResourceResponse.Failure
        }

        val body = response.body()

        return if (body !== null) {
            PageableResourceResponse.Success(
                PageableResource(
                    count = body.count,
                    next = body.next,
                    previous = body.previous,
                    results = body.results
                )
            )
        } else {
            PageableResourceResponse.Failure
        }
    }

    override suspend fun fetchPokemon(id: Int?): NamedResourceResponse {
        val response = client.fetchPokemon(id)

        if (!response.isSuccessful) {
            return NamedResourceResponse.Failure
        }

        val body = response.body()

        return if (body !== null) {
            NamedResourceResponse.Success(
                Pokemon(
                    id = body.id,
                    name = body.name,
                    baseExperience = body.baseExperience,
                    height = body.height,
                    isDefault = body.isDefault,
                    order = body.order,
                    weight = body.weight,
                    abilities = body.abilities,
                    sprites = body.sprites,
                    stats = body.stats,
                    types = body.types
                )
            )
        } else {
            NamedResourceResponse.Failure
        }
    }
}