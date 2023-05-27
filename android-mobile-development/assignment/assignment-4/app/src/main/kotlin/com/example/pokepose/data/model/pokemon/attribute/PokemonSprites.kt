package com.example.pokepose.data.model.pokemon.attribute

import com.squareup.moshi.Json

data class PokemonSprites(
    @field:Json(name = "front_default") val frontDefault: String,
    @field:Json(name = "front_female") val frontFemale: String,
    @field:Json(name = "front_shiny") val frontShiny: String,
    @field:Json(name = "front_shiny_female") val frontShinyFemale: String,
    @field:Json(name = "back_default") val backDefault: String,
    @field:Json(name = "back_female") val backFemale: String,
    @field:Json(name = "back_shiny") val backShiny: String,
    @field:Json(name = "back_shiny_female") val backShinyFemale: String,
    val other: OtherSpriteContainer
)

data class OtherSpriteContainer(
    @field:Json(name = "official-artwork") val officialArtworkSpriteSet: OfficialArtworkSpriteSet
)

data class OfficialArtworkSpriteSet(
    @field:Json(name = "front_default") val frontDefault: String,
    @field:Json(name = "front_shiny") val frontShiny: String
)