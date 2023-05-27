package com.kroger.android.interview.hackernews.data.model

import android.os.Parcelable
import kotlinx.android.parcel.Parcelize

@Parcelize
data class Item(
    val id: Int,
    val title: String,
    val text: String?,
    val time: Int,
    val type: String,
    val by: String?,
    val descendants: Int?,
    val kids: List<Int>?,
    val score: Int?,
    val url: String?,
) : Parcelable

sealed class ItemResponse {
    data class Success(
        val item: Item
    ) : ItemResponse()

    object Fetching : ItemResponse()
    object Failure : ItemResponse()
}