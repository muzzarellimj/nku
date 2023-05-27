package dev.muzzarelli.android.detail.ui

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.fragment.app.Fragment
import com.bumptech.glide.Glide
import dev.muzzarelli.android.detail.R

class PokemonFragment : Fragment() {

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view = inflater.inflate(R.layout.fragment_pokemon, container, false)

        if (arguments != null) {
            val name = requireArguments().getString("name")
            view.findViewById<TextView>(R.id.pokemon_name).text = name

            val sprite = requireArguments().getString("sprite")
            val spriteView = view.findViewById<ImageView>(R.id.pokemon_sprite)
            Glide.with(this).load(sprite).into(spriteView)

            val height = requireArguments().getInt("height")
            view.findViewById<TextView>(R.id.pokemon_height).text = height.toString()

            val weight = requireArguments().getInt("weight")
            view.findViewById<TextView>(R.id.pokemon_weight).text = weight.toString()
        }

        return view
    }
}