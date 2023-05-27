package com.example.pokepose.data.model

interface NamedResource

sealed class NamedResourceResponse {
    data class Success(
        val resource: NamedResource
    ) : NamedResourceResponse()

    object Fetching : NamedResourceResponse()
    object Failure : NamedResourceResponse()
}