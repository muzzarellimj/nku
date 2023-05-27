package com.example.pokepose.data.model.pokemon.attribute

import com.example.pokepose.data.model.ResourceDescriptor
import com.squareup.moshi.Json

data class PokemonStat(
    val stat: ResourceDescriptor,
    val effort: Int,
    @field:Json(name = "base_stat") val base: Int
)