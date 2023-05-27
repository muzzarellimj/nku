package dev.muzzarelli.android.detail.model

import com.squareup.moshi.JsonClass

@JsonClass(generateAdapter = true)
data class Pokedex(
    val data: List<Pokemon>
)

@JsonClass(generateAdapter = true)
data class Pokemon(
    val id: Int,
    val name: String,
    val baseExperience: Int,
    val height: Int,
    val weight: Int,
    val sprites: Sprites
)

@JsonClass(generateAdapter = true)
data class Sprites(
    val frontDefault: String,
    val frontShiny: String
)