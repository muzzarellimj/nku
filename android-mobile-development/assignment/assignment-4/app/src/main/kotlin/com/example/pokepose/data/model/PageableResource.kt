package com.example.pokepose.data.model

data class PageableResource(
    val count: Int,
    val next: String? = null,
    val previous: String? = null,
    val results: List<ResourceDescriptor>
)

data class ResourceDescriptor(
    val name: String,
    val url: String
) {
    var id: Int? = null
    var sprite: String? = null
}

sealed class PageableResourceResponse {
    data class Success(
        val pageable: PageableResource
    ): PageableResourceResponse()

    object Fetching : PageableResourceResponse()
    object Failure : PageableResourceResponse()
}