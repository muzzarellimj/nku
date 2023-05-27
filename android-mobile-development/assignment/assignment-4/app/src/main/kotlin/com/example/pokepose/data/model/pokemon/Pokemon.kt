package com.example.pokepose.data.model.pokemon

import com.example.pokepose.data.model.NamedResource
import com.example.pokepose.data.model.pokemon.attribute.PokemonAbility
import com.example.pokepose.data.model.pokemon.attribute.PokemonSprites
import com.example.pokepose.data.model.pokemon.attribute.PokemonStat
import com.example.pokepose.data.model.pokemon.attribute.PokemonType
import com.squareup.moshi.Json

data class Pokemon(
    val id: Int,
    val name: String,
    @field:Json(name = "base_experience") val baseExperience: Int,
    val height: Int,
    @field:Json(name = "is_default") val isDefault: Boolean,
    val order: Int,
    val weight: Int,
    val abilities: List<PokemonAbility>,
    val sprites: PokemonSprites,
    val stats: List<PokemonStat>,
    val types: List<PokemonType>
): NamedResource