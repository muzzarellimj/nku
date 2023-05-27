package dev.muzzarelli.android.detail.ui

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.GridLayoutManager
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.squareup.moshi.Moshi
import dev.muzzarelli.android.detail.PokemonAdapter
import dev.muzzarelli.android.detail.R
import dev.muzzarelli.android.detail.model.Pokedex

class PokedexFragment : Fragment() {

    private val data: String =
        """
            {
                "data": [
                    {
                        "id": 1,
                        "name": "Bulbasaur",
                        "baseExperience": 64,
                        "height": 7,
                        "weight": 69,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/1.png"
                        }
                    },
                    {
                        "id": 2,
                        "name": "Ivysaur",
                        "baseExperience": 142,
                        "height": 10,
                        "weight": 130,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/2.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/2.png"
                        }
                    },
                    {
                        "id": 3,
                        "name": "Venusaur",
                        "baseExperience": 263,
                        "height": 20,
                        "weight": 1000,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/3.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/3.png"
                        }
                    },
                    {
                        "id": 4,
                        "name": "Charmander",
                        "baseExperience": 62,
                        "height": 6,
                        "weight": 85,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/4.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/4.png"
                        }
                    },
                    {
                        "id": 5,
                        "name": "Charmeleon",
                        "baseExperience": 142,
                        "height": 11,
                        "weight": 190,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/5.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/5.png"
                        }
                    },
                    {
                        "id": 6,
                        "name": "Charizard",
                        "baseExperience": 267,
                        "height": 17,
                        "weight": 905,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/6.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/6.png"
                        }
                    },
                    {
                        "id": 7,
                        "name": "Squirtle",
                        "baseExperience": 63,
                        "height": 5,
                        "weight": 90,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/7.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/7.png"
                        }
                    },
                    {
                        "id": 8,
                        "name": "Wartortle",
                        "baseExperience": 142,
                        "height": 10,
                        "weight": 225,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/8.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/8.png"
                        }
                    },
                    {
                        "id": 9,
                        "name": "Blastoise",
                        "baseExperience": 265,
                        "height": 16,
                        "weight": 855,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/9.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/9.png"
                        }
                    },
                    {
                        "id": 10,
                        "name": "Caterpie",
                        "baseExperience": 39,
                        "height": 3,
                        "weight": 29,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/10.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/10.png"
                        }
                    },
                    {
                        "id": 11,
                        "name": "Metapod",
                        "baseExperience": 72,
                        "height": 7,
                        "weight": 99,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/11.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/11.png"
                        }
                    },
                    {
                        "id": 12,
                        "name": "Butterfree",
                        "baseExperience": 198,
                        "height": 11,
                        "weight": 320,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/12.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/12.png"
                        }
                    },
                    {
                        "id": 13,
                        "name": "Weedle",
                        "baseExperience": 39,
                        "height": 3,
                        "weight": 32,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/13.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/13.png"
                        }
                    },
                    {
                        "id": 14,
                        "name": "Kakuna",
                        "baseExperience": 72,
                        "height": 6,
                        "weight": 100,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/14.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/14.png"
                        }
                    },
                    {
                        "id": 15,
                        "name": "Beedrill",
                        "baseExperience": 178,
                        "height": 10,
                        "weight": 295,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/15.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/15.png"
                        }
                    },
                    {
                        "id": 16,
                        "name": "Pidgey",
                        "baseExperience": 50,
                        "height": 3,
                        "weight": 18,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/16.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/16.png"
                        }
                    },
                    {
                        "id": 17,
                        "name": "Pidgeotto",
                        "baseExperience": 122,
                        "height": 11,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/17.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/17.png"
                        }
                    },
                    {
                        "id": 18,
                        "name": "Pidgeot",
                        "baseExperience": 216,
                        "height": 15,
                        "weight": 395,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/18.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/18.png"
                        }
                    },
                    {
                        "id": 19,
                        "name": "Rattata",
                        "baseExperience": 51,
                        "height": 3,
                        "weight": 35,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/19.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/19.png"
                        }
                    },
                    {
                        "id": 20,
                        "name": "Raticate",
                        "baseExperience": 145,
                        "height": 7,
                        "weight": 185,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/20.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/20.png"
                        }
                    },
                    {
                        "id": 21,
                        "name": "Spearow",
                        "baseExperience": 52,
                        "height": 3,
                        "weight": 20,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/21.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/21.png"
                        }
                    },
                    {
                        "id": 22,
                        "name": "Fearow",
                        "baseExperience": 155,
                        "height": 12,
                        "weight": 380,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/22.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/22.png"
                        }
                    },
                    {
                        "id": 23,
                        "name": "Ekans",
                        "baseExperience": 58,
                        "height": 20,
                        "weight": 69,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/23.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/23.png"
                        }
                    },
                    {
                        "id": 24,
                        "name": "Arbok",
                        "baseExperience": 157,
                        "height": 35,
                        "weight": 650,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/24.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/24.png"
                        }
                    },
                    {
                        "id": 25,
                        "name": "Pikachu",
                        "baseExperience": 112,
                        "height": 4,
                        "weight": 60,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/25.png"
                        }
                    },
                    {
                        "id": 26,
                        "name": "Raichu",
                        "baseExperience": 243,
                        "height": 8,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/26.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/26.png"
                        }
                    },
                    {
                        "id": 27,
                        "name": "Sandshrew",
                        "baseExperience": 60,
                        "height": 6,
                        "weight": 120,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/27.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/27.png"
                        }
                    },
                    {
                        "id": 28,
                        "name": "Sandslash",
                        "baseExperience": 158,
                        "height": 10,
                        "weight": 295,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/28.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/28.png"
                        }
                    },
                    {
                        "id": 29,
                        "name": "Nidoran-f",
                        "baseExperience": 55,
                        "height": 4,
                        "weight": 70,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/29.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/29.png"
                        }
                    },
                    {
                        "id": 30,
                        "name": "Nidorina",
                        "baseExperience": 128,
                        "height": 8,
                        "weight": 200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/30.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/30.png"
                        }
                    },
                    {
                        "id": 31,
                        "name": "Nidoqueen",
                        "baseExperience": 253,
                        "height": 13,
                        "weight": 600,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/31.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/31.png"
                        }
                    },
                    {
                        "id": 32,
                        "name": "Nidoran-m",
                        "baseExperience": 55,
                        "height": 5,
                        "weight": 90,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/32.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/32.png"
                        }
                    },
                    {
                        "id": 33,
                        "name": "Nidorino",
                        "baseExperience": 128,
                        "height": 9,
                        "weight": 195,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/33.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/33.png"
                        }
                    },
                    {
                        "id": 34,
                        "name": "Nidoking",
                        "baseExperience": 253,
                        "height": 14,
                        "weight": 620,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/34.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/34.png"
                        }
                    },
                    {
                        "id": 35,
                        "name": "Clefairy",
                        "baseExperience": 113,
                        "height": 6,
                        "weight": 75,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/35.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/35.png"
                        }
                    },
                    {
                        "id": 36,
                        "name": "Clefable",
                        "baseExperience": 242,
                        "height": 13,
                        "weight": 400,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/36.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/36.png"
                        }
                    },
                    {
                        "id": 37,
                        "name": "Vulpix",
                        "baseExperience": 60,
                        "height": 6,
                        "weight": 99,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/37.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/37.png"
                        }
                    },
                    {
                        "id": 38,
                        "name": "Ninetales",
                        "baseExperience": 177,
                        "height": 11,
                        "weight": 199,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/38.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/38.png"
                        }
                    },
                    {
                        "id": 39,
                        "name": "Jigglypuff",
                        "baseExperience": 95,
                        "height": 5,
                        "weight": 55,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/39.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/39.png"
                        }
                    },
                    {
                        "id": 40,
                        "name": "Wigglytuff",
                        "baseExperience": 218,
                        "height": 10,
                        "weight": 120,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/40.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/40.png"
                        }
                    },
                    {
                        "id": 41,
                        "name": "Zubat",
                        "baseExperience": 49,
                        "height": 8,
                        "weight": 75,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/41.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/41.png"
                        }
                    },
                    {
                        "id": 42,
                        "name": "Golbat",
                        "baseExperience": 159,
                        "height": 16,
                        "weight": 550,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/42.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/42.png"
                        }
                    },
                    {
                        "id": 43,
                        "name": "Oddish",
                        "baseExperience": 64,
                        "height": 5,
                        "weight": 54,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/43.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/43.png"
                        }
                    },
                    {
                        "id": 44,
                        "name": "Gloom",
                        "baseExperience": 138,
                        "height": 8,
                        "weight": 86,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/44.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/44.png"
                        }
                    },
                    {
                        "id": 45,
                        "name": "Vileplume",
                        "baseExperience": 245,
                        "height": 12,
                        "weight": 186,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/45.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/45.png"
                        }
                    },
                    {
                        "id": 46,
                        "name": "Paras",
                        "baseExperience": 57,
                        "height": 3,
                        "weight": 54,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/46.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/46.png"
                        }
                    },
                    {
                        "id": 47,
                        "name": "Parasect",
                        "baseExperience": 142,
                        "height": 10,
                        "weight": 295,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/47.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/47.png"
                        }
                    },
                    {
                        "id": 48,
                        "name": "Venonat",
                        "baseExperience": 61,
                        "height": 10,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/48.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/48.png"
                        }
                    },
                    {
                        "id": 49,
                        "name": "Venomoth",
                        "baseExperience": 158,
                        "height": 15,
                        "weight": 125,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/49.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/49.png"
                        }
                    },
                    {
                        "id": 50,
                        "name": "Diglett",
                        "baseExperience": 53,
                        "height": 2,
                        "weight": 8,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/50.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/50.png"
                        }
                    },
                    {
                        "id": 51,
                        "name": "Dugtrio",
                        "baseExperience": 149,
                        "height": 7,
                        "weight": 333,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/51.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/51.png"
                        }
                    },
                    {
                        "id": 52,
                        "name": "Meowth",
                        "baseExperience": 58,
                        "height": 4,
                        "weight": 42,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/52.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/52.png"
                        }
                    },
                    {
                        "id": 53,
                        "name": "Persian",
                        "baseExperience": 154,
                        "height": 10,
                        "weight": 320,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/53.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/53.png"
                        }
                    },
                    {
                        "id": 54,
                        "name": "Psyduck",
                        "baseExperience": 64,
                        "height": 8,
                        "weight": 196,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/54.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/54.png"
                        }
                    },
                    {
                        "id": 55,
                        "name": "Golduck",
                        "baseExperience": 175,
                        "height": 17,
                        "weight": 766,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/55.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/55.png"
                        }
                    },
                    {
                        "id": 56,
                        "name": "Mankey",
                        "baseExperience": 61,
                        "height": 5,
                        "weight": 280,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/56.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/56.png"
                        }
                    },
                    {
                        "id": 57,
                        "name": "Primeape",
                        "baseExperience": 159,
                        "height": 10,
                        "weight": 320,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/57.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/57.png"
                        }
                    },
                    {
                        "id": 58,
                        "name": "Growlithe",
                        "baseExperience": 70,
                        "height": 7,
                        "weight": 190,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/58.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/58.png"
                        }
                    },
                    {
                        "id": 59,
                        "name": "Arcanine",
                        "baseExperience": 194,
                        "height": 19,
                        "weight": 1550,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/59.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/59.png"
                        }
                    },
                    {
                        "id": 60,
                        "name": "Poliwag",
                        "baseExperience": 60,
                        "height": 6,
                        "weight": 124,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/60.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/60.png"
                        }
                    },
                    {
                        "id": 61,
                        "name": "Poliwhirl",
                        "baseExperience": 135,
                        "height": 10,
                        "weight": 200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/61.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/61.png"
                        }
                    },
                    {
                        "id": 62,
                        "name": "Poliwrath",
                        "baseExperience": 255,
                        "height": 13,
                        "weight": 540,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/62.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/62.png"
                        }
                    },
                    {
                        "id": 63,
                        "name": "Abra",
                        "baseExperience": 62,
                        "height": 9,
                        "weight": 195,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/63.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/63.png"
                        }
                    },
                    {
                        "id": 64,
                        "name": "Kadabra",
                        "baseExperience": 140,
                        "height": 13,
                        "weight": 565,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/64.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/64.png"
                        }
                    },
                    {
                        "id": 65,
                        "name": "Alakazam",
                        "baseExperience": 250,
                        "height": 15,
                        "weight": 480,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/65.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/65.png"
                        }
                    },
                    {
                        "id": 66,
                        "name": "Machop",
                        "baseExperience": 61,
                        "height": 8,
                        "weight": 195,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/66.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/66.png"
                        }
                    },
                    {
                        "id": 67,
                        "name": "Machoke",
                        "baseExperience": 142,
                        "height": 15,
                        "weight": 705,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/67.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/67.png"
                        }
                    },
                    {
                        "id": 68,
                        "name": "Machamp",
                        "baseExperience": 253,
                        "height": 16,
                        "weight": 1300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/68.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/68.png"
                        }
                    },
                    {
                        "id": 69,
                        "name": "Bellsprout",
                        "baseExperience": 60,
                        "height": 7,
                        "weight": 40,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/69.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/69.png"
                        }
                    },
                    {
                        "id": 70,
                        "name": "Weepinbell",
                        "baseExperience": 137,
                        "height": 10,
                        "weight": 64,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/70.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/70.png"
                        }
                    },
                    {
                        "id": 71,
                        "name": "Victreebel",
                        "baseExperience": 221,
                        "height": 17,
                        "weight": 155,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/71.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/71.png"
                        }
                    },
                    {
                        "id": 72,
                        "name": "Tentacool",
                        "baseExperience": 67,
                        "height": 9,
                        "weight": 455,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/72.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/72.png"
                        }
                    },
                    {
                        "id": 73,
                        "name": "Tentacruel",
                        "baseExperience": 180,
                        "height": 16,
                        "weight": 550,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/73.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/73.png"
                        }
                    },
                    {
                        "id": 74,
                        "name": "Geodude",
                        "baseExperience": 60,
                        "height": 4,
                        "weight": 200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/74.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/74.png"
                        }
                    },
                    {
                        "id": 75,
                        "name": "Graveler",
                        "baseExperience": 137,
                        "height": 10,
                        "weight": 1050,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/75.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/75.png"
                        }
                    },
                    {
                        "id": 76,
                        "name": "Golem",
                        "baseExperience": 223,
                        "height": 14,
                        "weight": 3000,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/76.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/76.png"
                        }
                    },
                    {
                        "id": 77,
                        "name": "Ponyta",
                        "baseExperience": 82,
                        "height": 10,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/77.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/77.png"
                        }
                    },
                    {
                        "id": 78,
                        "name": "Rapidash",
                        "baseExperience": 175,
                        "height": 17,
                        "weight": 950,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/78.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/78.png"
                        }
                    },
                    {
                        "id": 79,
                        "name": "Slowpoke",
                        "baseExperience": 63,
                        "height": 12,
                        "weight": 360,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/79.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/79.png"
                        }
                    },
                    {
                        "id": 80,
                        "name": "Slowbro",
                        "baseExperience": 172,
                        "height": 16,
                        "weight": 785,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/80.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/80.png"
                        }
                    },
                    {
                        "id": 81,
                        "name": "Magnemite",
                        "baseExperience": 65,
                        "height": 3,
                        "weight": 60,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/81.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/81.png"
                        }
                    },
                    {
                        "id": 82,
                        "name": "Magneton",
                        "baseExperience": 163,
                        "height": 10,
                        "weight": 600,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/82.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/82.png"
                        }
                    },
                    {
                        "id": 83,
                        "name": "Farfetchd",
                        "baseExperience": 132,
                        "height": 8,
                        "weight": 150,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/83.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/83.png"
                        }
                    },
                    {
                        "id": 84,
                        "name": "Doduo",
                        "baseExperience": 62,
                        "height": 14,
                        "weight": 392,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/84.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/84.png"
                        }
                    },
                    {
                        "id": 85,
                        "name": "Dodrio",
                        "baseExperience": 165,
                        "height": 18,
                        "weight": 852,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/85.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/85.png"
                        }
                    },
                    {
                        "id": 86,
                        "name": "Seel",
                        "baseExperience": 65,
                        "height": 11,
                        "weight": 900,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/86.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/86.png"
                        }
                    },
                    {
                        "id": 87,
                        "name": "Dewgong",
                        "baseExperience": 166,
                        "height": 17,
                        "weight": 1200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/87.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/87.png"
                        }
                    },
                    {
                        "id": 88,
                        "name": "Grimer",
                        "baseExperience": 65,
                        "height": 9,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/88.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/88.png"
                        }
                    },
                    {
                        "id": 89,
                        "name": "Muk",
                        "baseExperience": 175,
                        "height": 12,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/89.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/89.png"
                        }
                    },
                    {
                        "id": 90,
                        "name": "Shellder",
                        "baseExperience": 61,
                        "height": 3,
                        "weight": 40,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/90.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/90.png"
                        }
                    },
                    {
                        "id": 91,
                        "name": "Cloyster",
                        "baseExperience": 184,
                        "height": 15,
                        "weight": 1325,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/91.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/91.png"
                        }
                    },
                    {
                        "id": 92,
                        "name": "Gastly",
                        "baseExperience": 62,
                        "height": 13,
                        "weight": 1,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/92.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/92.png"
                        }
                    },
                    {
                        "id": 93,
                        "name": "Haunter",
                        "baseExperience": 142,
                        "height": 16,
                        "weight": 1,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/93.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/93.png"
                        }
                    },
                    {
                        "id": 94,
                        "name": "Gengar",
                        "baseExperience": 250,
                        "height": 15,
                        "weight": 405,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/94.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/94.png"
                        }
                    },
                    {
                        "id": 95,
                        "name": "Onix",
                        "baseExperience": 77,
                        "height": 88,
                        "weight": 2100,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/95.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/95.png"
                        }
                    },
                    {
                        "id": 96,
                        "name": "Drowzee",
                        "baseExperience": 66,
                        "height": 10,
                        "weight": 324,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/96.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/96.png"
                        }
                    },
                    {
                        "id": 97,
                        "name": "Hypno",
                        "baseExperience": 169,
                        "height": 16,
                        "weight": 756,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/97.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/97.png"
                        }
                    },
                    {
                        "id": 98,
                        "name": "Krabby",
                        "baseExperience": 65,
                        "height": 4,
                        "weight": 65,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/98.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/98.png"
                        }
                    },
                    {
                        "id": 99,
                        "name": "Kingler",
                        "baseExperience": 166,
                        "height": 13,
                        "weight": 600,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/99.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/99.png"
                        }
                    },
                    {
                        "id": 100,
                        "name": "Voltorb",
                        "baseExperience": 66,
                        "height": 5,
                        "weight": 104,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/100.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/100.png"
                        }
                    },
                    {
                        "id": 101,
                        "name": "Electrode",
                        "baseExperience": 172,
                        "height": 12,
                        "weight": 666,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/101.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/101.png"
                        }
                    },
                    {
                        "id": 102,
                        "name": "Exeggcute",
                        "baseExperience": 65,
                        "height": 4,
                        "weight": 25,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/102.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/102.png"
                        }
                    },
                    {
                        "id": 103,
                        "name": "Exeggutor",
                        "baseExperience": 186,
                        "height": 20,
                        "weight": 1200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/103.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/103.png"
                        }
                    },
                    {
                        "id": 104,
                        "name": "Cubone",
                        "baseExperience": 64,
                        "height": 4,
                        "weight": 65,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/104.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/104.png"
                        }
                    },
                    {
                        "id": 105,
                        "name": "Marowak",
                        "baseExperience": 149,
                        "height": 10,
                        "weight": 450,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/105.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/105.png"
                        }
                    },
                    {
                        "id": 106,
                        "name": "Hitmonlee",
                        "baseExperience": 159,
                        "height": 15,
                        "weight": 498,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/106.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/106.png"
                        }
                    },
                    {
                        "id": 107,
                        "name": "Hitmonchan",
                        "baseExperience": 159,
                        "height": 14,
                        "weight": 502,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/107.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/107.png"
                        }
                    },
                    {
                        "id": 108,
                        "name": "Lickitung",
                        "baseExperience": 77,
                        "height": 12,
                        "weight": 655,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/108.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/108.png"
                        }
                    },
                    {
                        "id": 109,
                        "name": "Koffing",
                        "baseExperience": 68,
                        "height": 6,
                        "weight": 10,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/109.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/109.png"
                        }
                    },
                    {
                        "id": 110,
                        "name": "Weezing",
                        "baseExperience": 172,
                        "height": 12,
                        "weight": 95,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/110.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/110.png"
                        }
                    },
                    {
                        "id": 111,
                        "name": "Rhyhorn",
                        "baseExperience": 69,
                        "height": 10,
                        "weight": 1150,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/111.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/111.png"
                        }
                    },
                    {
                        "id": 112,
                        "name": "Rhydon",
                        "baseExperience": 170,
                        "height": 19,
                        "weight": 1200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/112.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/112.png"
                        }
                    },
                    {
                        "id": 113,
                        "name": "Chansey",
                        "baseExperience": 395,
                        "height": 11,
                        "weight": 346,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/113.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/113.png"
                        }
                    },
                    {
                        "id": 114,
                        "name": "Tangela",
                        "baseExperience": 87,
                        "height": 10,
                        "weight": 350,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/114.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/114.png"
                        }
                    },
                    {
                        "id": 115,
                        "name": "Kangaskhan",
                        "baseExperience": 172,
                        "height": 22,
                        "weight": 800,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/115.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/115.png"
                        }
                    },
                    {
                        "id": 116,
                        "name": "Horsea",
                        "baseExperience": 59,
                        "height": 4,
                        "weight": 80,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/116.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/116.png"
                        }
                    },
                    {
                        "id": 117,
                        "name": "Seadra",
                        "baseExperience": 154,
                        "height": 12,
                        "weight": 250,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/117.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/117.png"
                        }
                    },
                    {
                        "id": 118,
                        "name": "Goldeen",
                        "baseExperience": 64,
                        "height": 6,
                        "weight": 150,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/118.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/118.png"
                        }
                    },
                    {
                        "id": 119,
                        "name": "Seaking",
                        "baseExperience": 158,
                        "height": 13,
                        "weight": 390,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/119.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/119.png"
                        }
                    },
                    {
                        "id": 120,
                        "name": "Staryu",
                        "baseExperience": 68,
                        "height": 8,
                        "weight": 345,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/120.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/120.png"
                        }
                    },
                    {
                        "id": 121,
                        "name": "Starmie",
                        "baseExperience": 182,
                        "height": 11,
                        "weight": 800,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/121.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/121.png"
                        }
                    },
                    {
                        "id": 122,
                        "name": "Mr-mime",
                        "baseExperience": 161,
                        "height": 13,
                        "weight": 545,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/122.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/122.png"
                        }
                    },
                    {
                        "id": 123,
                        "name": "Scyther",
                        "baseExperience": 100,
                        "height": 15,
                        "weight": 560,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/123.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/123.png"
                        }
                    },
                    {
                        "id": 124,
                        "name": "Jynx",
                        "baseExperience": 159,
                        "height": 14,
                        "weight": 406,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/124.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/124.png"
                        }
                    },
                    {
                        "id": 125,
                        "name": "Electabuzz",
                        "baseExperience": 172,
                        "height": 11,
                        "weight": 300,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/125.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/125.png"
                        }
                    },
                    {
                        "id": 126,
                        "name": "Magmar",
                        "baseExperience": 173,
                        "height": 13,
                        "weight": 445,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/126.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/126.png"
                        }
                    },
                    {
                        "id": 127,
                        "name": "Pinsir",
                        "baseExperience": 175,
                        "height": 15,
                        "weight": 550,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/127.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/127.png"
                        }
                    },
                    {
                        "id": 128,
                        "name": "Tauros",
                        "baseExperience": 172,
                        "height": 14,
                        "weight": 884,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/128.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/128.png"
                        }
                    },
                    {
                        "id": 129,
                        "name": "Magikarp",
                        "baseExperience": 40,
                        "height": 9,
                        "weight": 100,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/129.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/129.png"
                        }
                    },
                    {
                        "id": 130,
                        "name": "Gyarados",
                        "baseExperience": 189,
                        "height": 65,
                        "weight": 2350,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/130.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/130.png"
                        }
                    },
                    {
                        "id": 131,
                        "name": "Lapras",
                        "baseExperience": 187,
                        "height": 25,
                        "weight": 2200,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/131.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/131.png"
                        }
                    },
                    {
                        "id": 132,
                        "name": "Ditto",
                        "baseExperience": 101,
                        "height": 3,
                        "weight": 40,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/132.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/132.png"
                        }
                    },
                    {
                        "id": 133,
                        "name": "Eevee",
                        "baseExperience": 65,
                        "height": 3,
                        "weight": 65,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/133.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/133.png"
                        }
                    },
                    {
                        "id": 134,
                        "name": "Vaporeon",
                        "baseExperience": 184,
                        "height": 10,
                        "weight": 290,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/134.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/134.png"
                        }
                    },
                    {
                        "id": 135,
                        "name": "Jolteon",
                        "baseExperience": 184,
                        "height": 8,
                        "weight": 245,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/135.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/135.png"
                        }
                    },
                    {
                        "id": 136,
                        "name": "Flareon",
                        "baseExperience": 184,
                        "height": 9,
                        "weight": 250,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/136.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/136.png"
                        }
                    },
                    {
                        "id": 137,
                        "name": "Porygon",
                        "baseExperience": 79,
                        "height": 8,
                        "weight": 365,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/137.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/137.png"
                        }
                    },
                    {
                        "id": 138,
                        "name": "Omanyte",
                        "baseExperience": 71,
                        "height": 4,
                        "weight": 75,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/138.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/138.png"
                        }
                    },
                    {
                        "id": 139,
                        "name": "Omastar",
                        "baseExperience": 173,
                        "height": 10,
                        "weight": 350,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/139.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/139.png"
                        }
                    },
                    {
                        "id": 140,
                        "name": "Kabuto",
                        "baseExperience": 71,
                        "height": 5,
                        "weight": 115,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/140.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/140.png"
                        }
                    },
                    {
                        "id": 141,
                        "name": "Kabutops",
                        "baseExperience": 173,
                        "height": 13,
                        "weight": 405,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/141.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/141.png"
                        }
                    },
                    {
                        "id": 142,
                        "name": "Aerodactyl",
                        "baseExperience": 180,
                        "height": 18,
                        "weight": 590,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/142.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/142.png"
                        }
                    },
                    {
                        "id": 143,
                        "name": "Snorlax",
                        "baseExperience": 189,
                        "height": 21,
                        "weight": 4600,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/143.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/143.png"
                        }
                    },
                    {
                        "id": 144,
                        "name": "Articuno",
                        "baseExperience": 290,
                        "height": 17,
                        "weight": 554,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/144.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/144.png"
                        }
                    },
                    {
                        "id": 145,
                        "name": "Zapdos",
                        "baseExperience": 290,
                        "height": 16,
                        "weight": 526,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/145.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/145.png"
                        }
                    },
                    {
                        "id": 146,
                        "name": "Moltres",
                        "baseExperience": 290,
                        "height": 20,
                        "weight": 600,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/146.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/146.png"
                        }
                    },
                    {
                        "id": 147,
                        "name": "Dratini",
                        "baseExperience": 60,
                        "height": 18,
                        "weight": 33,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/147.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/147.png"
                        }
                    },
                    {
                        "id": 148,
                        "name": "Dragonair",
                        "baseExperience": 147,
                        "height": 40,
                        "weight": 165,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/148.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/148.png"
                        }
                    },
                    {
                        "id": 149,
                        "name": "Dragonite",
                        "baseExperience": 300,
                        "height": 22,
                        "weight": 2100,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/149.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/149.png"
                        }
                    },
                    {
                        "id": 150,
                        "name": "Mewtwo",
                        "baseExperience": 340,
                        "height": 20,
                        "weight": 1220,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/150.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/150.png"
                        }
                    },
                    {
                        "id": 151,
                        "name": "Mew",
                        "baseExperience": 300,
                        "height": 4,
                        "weight": 40,
                        "sprites": {
                            "frontDefault": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/151.png",
                            "frontShiny": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/151.png"
                        }
                    }
                ]
            }
        """

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view = inflater.inflate(R.layout.fragment_pokedex, container, false)
        val recyclerView = view.findViewById<RecyclerView>(R.id.pokedex_recycler)
        recyclerView.layoutManager = GridLayoutManager(requireContext(), 2)

        val moshi: Moshi = Moshi.Builder().build()
        val dataAdapter = moshi.adapter(Pokedex::class.java)
        val pokedexData = dataAdapter.fromJson(data)
        val pokedex = pokedexData?.data

        val adapter = PokemonAdapter(pokedex!!)
        recyclerView.adapter = adapter

        return view
    }
}