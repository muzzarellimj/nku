package dev.muzzarelli.android.detail

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.core.os.bundleOf
import androidx.fragment.app.commit
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import dev.muzzarelli.android.detail.model.Pokemon
import dev.muzzarelli.android.detail.ui.PokemonFragment

class PokemonAdapter(private val pokedex: List<Pokemon>) : RecyclerView.Adapter<PokemonAdapter.PokemonViewHolder>() {

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): PokemonViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.fragment_pokedex_card, parent, false)

        return PokemonViewHolder(view) { adapterPosition ->
            val pokemon = pokedex[adapterPosition]

            val bundle = bundleOf(
                "name" to pokemon.name,
                "base_experience" to pokemon.baseExperience,
                "height" to pokemon.height,
                "weight" to pokemon.weight,
                "sprite" to pokemon.sprites.frontDefault
            )

            val pokemonFragment = PokemonFragment()
            pokemonFragment.arguments = bundle

            val activity = view.context as AppCompatActivity

            activity.supportFragmentManager.commit {
                setReorderingAllowed(true)
                replace(R.id.fragment_container, pokemonFragment)
                addToBackStack(null)
            }
        }
    }

    override fun getItemCount(): Int = pokedex.size

    override fun onBindViewHolder(holder: PokemonViewHolder, position: Int) {
        val pokemon = pokedex[position]

        holder.name.text = pokemon.name
        Glide.with(holder.itemView.context).load(pokemon.sprites.frontDefault).into(holder.sprite)
    }


    inner class PokemonViewHolder(
        view: View,
        private val onClick: (adapterPosition: Int) -> Unit
    ) : RecyclerView.ViewHolder(view) {
        val name: TextView = view.findViewById(R.id.pokedex_name)
        val sprite: ImageView = view.findViewById(R.id.pokedex_sprite)

        init {
            view.setOnClickListener {
                onClick(adapterPosition)
            }
        }
    }
}