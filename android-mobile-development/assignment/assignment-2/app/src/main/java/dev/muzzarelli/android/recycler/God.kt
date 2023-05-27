package dev.muzzarelli.android.recycler

/**
 * A data class to represent ascendant characters -- deities -- in RuneScape.
 *
 * @property id a unique numeric identifier
 * @property image a character image name -- should match the name
 * @property name a character name
 * @property tier a loose rank -- a value dependent on general power and abilities
 * @property race a loose category the character fits within
 * @property description a short character description -- an examine message
 */
data class God(
    val id: Int,
    val image: String,
    val name: String,
    val tier: String,
    val race: String,
    val description: String
)
