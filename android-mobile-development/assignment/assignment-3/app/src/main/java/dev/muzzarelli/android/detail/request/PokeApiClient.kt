package dev.muzzarelli.android.detail.request

import android.util.Log
import okhttp3.*
import java.io.IOException

class PokeApiClient {

    private val apiPath: String = "https://pokeapi.co/api/v2/"
    private val client: OkHttpClient = OkHttpClient()

    fun requestRepository(limit: Int, offset: Int) {
        val request: Request = Request.Builder()
            .url("${apiPath}pokemon?limit=${limit}&offset=${offset}")
            .build()

        client.newCall(request).enqueue(object : Callback {
            override fun onFailure(call: Call, e: IOException) {
                Log.e("PokeApiClient", "requestRepository resulted in failure - see stacktrace.")
                e.printStackTrace()
            }

            override fun onResponse(call: Call, response: Response) {
                response.use {
                    if (!response.isSuccessful) throw IOException("Unexpected IOException: $response")

                    Log.i("PokeApiClient", response.body!!.string())
                }
            }
        })
    }

    fun requestPokemon(name: String) {
        val request: Request = Request.Builder()
            .url("${apiPath}pokemon/${name}")
            .build()

        client.newCall(request).enqueue(object : Callback {
            override fun onFailure(call: Call, e: IOException) {
                Log.e("PokeApiClient", "requestPokemon resulted in failure - see stacktrace.")
                e.printStackTrace()
            }

            override fun onResponse(call: Call, response: Response) {
                response.use {
                    if (!response.isSuccessful) throw IOException("Unexpected IOException: $response")

                    Log.i("PokeApiClient", response.body!!.string())
                }
            }
        })
    }
}