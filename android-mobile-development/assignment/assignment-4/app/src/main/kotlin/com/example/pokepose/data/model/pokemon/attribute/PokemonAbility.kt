package com.example.pokepose.data.model.pokemon.attribute

import com.example.pokepose.data.model.ResourceDescriptor
import com.squareup.moshi.Json

data class PokemonAbility(
    val ability: ResourceDescriptor,
    @field:Json(name = "is_hidden") val hidden: Boolean,
    val slot: Int
)