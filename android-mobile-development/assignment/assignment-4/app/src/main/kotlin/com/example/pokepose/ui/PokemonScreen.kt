package com.example.pokepose.ui

import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.collectAsState
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.hilt.navigation.compose.hiltViewModel
import com.bumptech.glide.integration.compose.ExperimentalGlideComposeApi
import com.bumptech.glide.integration.compose.GlideImage
import com.example.pokepose.data.model.pokemon.Pokemon
import com.example.pokepose.ui.theme.PokemonType

@Composable
fun PokemonRoute(
    viewModel: PokemonViewModel = hiltViewModel()
) {
    when (val pokemonState = viewModel.pokemonState.collectAsState().value) {
        is PokemonState.Success -> {
            if (pokemonState.resource !== null) {
                PokemonScreen(pokemon = pokemonState.resource as Pokemon)
            } else {
                Text("False - pokemonState is null")
            }
        }

        else -> Text("Else - either loading or failed")
    }
}

@OptIn(ExperimentalGlideComposeApi::class)
@Composable
fun PokemonScreen(
    pokemon: Pokemon
) {
    Column {
        Card(
            modifier = Modifier
                .fillMaxWidth()
                .height(312.dp),
            colors = CardDefaults.cardColors(
                containerColor = Color(0xFFd8f3ea)
            ),
            shape = RoundedCornerShape(0, 0, 15, 15)
        ) {
            GlideImage(
                model = pokemon.sprites.other.officialArtworkSpriteSet.frontDefault,
                contentDescription = "picture of ${pokemon.name}",
                contentScale = ContentScale.FillHeight,
                modifier = Modifier.align(Alignment.CenterHorizontally)
            )
        }

        Text(
            modifier = Modifier.padding(24.dp, 24.dp),
            text = pokemon.name.replaceFirstChar { it.titlecase() },
            fontWeight = FontWeight(FontWeight.Bold.weight),
            fontFamily = FontFamily.SansSerif,
            fontSize = 32.sp
        )

        PokemonAttributeRow(key = "Pokedex ID:", value = "# ${pokemon.id.toString().padStart(3, '0')}")
        PokemonAttributeRow(key = "Height:", value = "${pokemon.height}m")
        PokemonAttributeRow(key = "Weight:", value = "${pokemon.weight}kg")
        PokemonAttributeRow(key = "Base Experience:", value = "${pokemon.baseExperience}xp")
    }
}

@Composable
fun PokemonAttributeRow(
    key: String,
    value: String
) {
    Row(
        modifier = Modifier.padding(24.dp, 8.dp)
    ) {
        Column {
            Text(
                text = key,
                fontWeight = FontWeight(FontWeight.Bold.weight),
                fontFamily = FontFamily.SansSerif,
                fontSize = 18.sp,
                color = PokemonType.NORMAL_PRIMARY,
                modifier = Modifier.padding(end = 8.dp)
            )
        }

        Column {
            Text(
                text = value,
                fontWeight = FontWeight(FontWeight.Medium.weight),
                fontFamily = FontFamily.SansSerif,
                fontSize = 18.sp
            )
        }
    }
}