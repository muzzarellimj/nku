package com.example.pokepose.ui

import androidx.compose.foundation.BorderStroke
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.grid.GridCells
import androidx.compose.foundation.lazy.grid.LazyVerticalGrid
import androidx.compose.foundation.lazy.grid.items
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.collectAsState
import androidx.compose.ui.Modifier
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.hilt.navigation.compose.hiltViewModel
import androidx.navigation.NavController
import com.bumptech.glide.integration.compose.ExperimentalGlideComposeApi
import com.bumptech.glide.integration.compose.GlideImage
import com.example.pokepose.data.model.ResourceDescriptor
import com.example.pokepose.ui.theme.PokemonType

@Composable
fun PokedexRoute(
    viewModel: PokedexViewModel = hiltViewModel(),
    navController: NavController
) {
    when (val pokedexState = viewModel.pokedexState.collectAsState().value) {
        is PokedexState.Success -> {
            if (pokedexState.pageable?.results != null) {
                PokedexScreen(pokedexContent = pokedexState.pageable.results, navController = navController)
            } else {
                Text(text = "False - pokedexState is null")
            }
        }

        else -> Text("Else - either loading or failed.")
    }
}

@Composable
fun PokedexScreen(
    pokedexContent: List<ResourceDescriptor>,
    navController: NavController
) {
    Column {
        Text(
            modifier = Modifier.padding(16.dp, 24.dp),
            text = "Pokédex",
            fontWeight = FontWeight(FontWeight.Bold.weight),
            fontFamily = FontFamily.SansSerif,
            fontSize = 32.sp
        )
        LazyVerticalGrid(
            columns = GridCells.Fixed(2),
            contentPadding = PaddingValues(16.dp),
            verticalArrangement = Arrangement.spacedBy(24.dp),
            horizontalArrangement = Arrangement.spacedBy(24.dp)
        ) {
            items(items = pokedexContent, itemContent = {
                PokedexCard(pokemon = it, navController = navController)
            })
        }
    }
}

@OptIn(ExperimentalGlideComposeApi::class)
@Composable
fun PokedexCard(
    pokemon: ResourceDescriptor,
    navController: NavController
) {
    Card(
        modifier = Modifier
            .fillMaxWidth()
            .clickable(onClick = {
                navController.navigate("pokemon/${pokemon.id}")
            }),
        border = BorderStroke(2.dp, PokemonType.GRASS_PRIMARY),
        colors = CardDefaults.cardColors(
            containerColor = PokemonType.GRASS_SECONDARY
        ),
        shape = RoundedCornerShape(16.dp)
    ) {
        GlideImage(
            model = pokemon.sprite,
            contentDescription = "pokemon",
            contentScale = ContentScale.FillBounds
        )
    }
}