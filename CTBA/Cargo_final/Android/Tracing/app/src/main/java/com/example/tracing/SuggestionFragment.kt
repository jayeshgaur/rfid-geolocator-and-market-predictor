package com.example.tracing

import android.os.Bundle
import android.support.v4.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ArrayAdapter
import android.widget.Spinner
import kotlinx.android.synthetic.main.suggestion_fragment.view.*


class SuggestionFragment : Fragment() {
    lateinit var rootView: View
    lateinit var cargoType: Spinner
    lateinit var season:Spinner
    lateinit var destCountry:Spinner
    lateinit var destCont:Spinner
    lateinit var cargoArray:Array<String>
    lateinit var seasonArray:Array<String>
    lateinit var destCountryArray:Array<String>
    lateinit var destContArray:Array<String>
    lateinit var arrayAdapter:ArrayAdapter<String>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        rootView = inflater.inflate(R.layout.suggestion_fragment, container, false)
        rootView.check_cargo_type.setOnClickListener {
            arrayAdapter = ArrayAdapter(activity,android.R.layout.simple_spinner_item, arrayOf("Electronics","Clothing"))
            arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            rootView.cargo_spinner.adapter = arrayAdapter
            if(rootView.check_cargo_type.isChecked) rootView.cargo_spinner.visibility = View.VISIBLE
            else if(!rootView.check_cargo_type.isChecked) rootView.cargo_spinner.visibility = View.GONE
        }
        rootView.check_season.setOnClickListener {
            arrayAdapter = ArrayAdapter(activity,android.R.layout.simple_spinner_item, arrayOf("Summer","Winter","Rainy"))
            arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            rootView.season_spinner.adapter = arrayAdapter
            if(rootView.check_season.isChecked) rootView.season_spinner.visibility = View.VISIBLE
            else if(!rootView.check_season.isChecked) rootView.season_spinner.visibility = View.GONE
        }
        rootView.check_dest_country.setOnClickListener {
            arrayAdapter = ArrayAdapter(activity,android.R.layout.simple_spinner_item, arrayOf("India","Japan"))
            arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            rootView.dest_country_spinner.adapter = arrayAdapter
            if(rootView.check_dest_country.isChecked) rootView.dest_country_spinner.visibility = View.VISIBLE
            else if(!rootView.check_dest_country.isChecked) rootView.dest_country_spinner.visibility = View.GONE
        }
        rootView.check_dest_cont.setOnClickListener {
            arrayAdapter = ArrayAdapter(activity,android.R.layout.simple_spinner_item, arrayOf("Asia","Europe"))
            arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            rootView.dest_cont_spinner.adapter = arrayAdapter
            if(rootView.check_dest_cont.isChecked) rootView.dest_cont_spinner.visibility = View.VISIBLE
            else if(!rootView.check_dest_cont.isChecked) rootView.dest_cont_spinner.visibility = View.GONE
        }
        rootView.check_product_name.setOnClickListener {
            if(rootView.check_product_name.isChecked) rootView.prod_name.visibility = View.VISIBLE
            else if(!rootView.check_product_name.isChecked) rootView.prod_name.visibility = View.GONE
        }
        return rootView
    }
}
