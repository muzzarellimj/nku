package com.example.pokepose

import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.navigation.NavHostController
import androidx.navigation.NavType
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import androidx.navigation.navArgument
import com.example.pokepose.ui.PokedexRoute
import com.example.pokepose.ui.PokemonRoute

@Composable
fun PokeposeNavHost(
    modifier: Modifier = Modifier,
    navController: NavHostController = rememberNavController(),
    startDestination: String = "pokedex"
) {
    NavHost(
        modifier = modifier,
        navController = navController,
        startDestination = startDestination
    ) {
        composable(
            route = "pokedex"
        ) {
            PokedexRoute(navController = navController)
        }

        composable(
            route = "pokemon/{id}",
            arguments = listOf(navArgument("id") { type = NavType.IntType })
        ) {
            PokemonRoute()
        }
    }
}