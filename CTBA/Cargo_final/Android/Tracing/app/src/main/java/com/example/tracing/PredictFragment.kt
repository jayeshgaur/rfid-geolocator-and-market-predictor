package com.example.tracing

import android.content.Intent
import android.os.Bundle
import android.support.v4.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import kotlinx.android.synthetic.main.predict_fragment.view.*


class PredictFragment : Fragment() {
    lateinit var rootView: View

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        rootView = inflater.inflate(R.layout.predict_fragment, container, false)
        val queue = Volley.newRequestQueue(activity?.applicationContext)
        val url = "http://192.168.0.108/Cargo2103/predict1.php"
        rootView.predict.setOnClickListener{
            val stringRequest =object : StringRequest(Request.Method.POST, url, Response.Listener { s ->
                Toast.makeText(activity?.applicationContext,s.toString(),Toast.LENGTH_SHORT).show()
                var intent = Intent(activity?.applicationContext,WebViewActivity::class.java)
                intent.putExtra("data",s.toString())
                startActivity(intent)
            }, Response.ErrorListener { e ->
                Toast.makeText(activity?.applicationContext,e.toString(),Toast.LENGTH_SHORT).show()
            }) {
                override fun getParams(): Map<String, String> = mapOf("CargoType" to rootView.cargo_type.text.toString(),
                    "ProductName" to rootView.prod_name.text.toString(),"Season" to rootView.season.text.toString(),
                    "DCountry" to rootView.destination_country.text.toString(),"DConti" to rootView.destination_continent   .text.toString())
            }
            queue.add(stringRequest)
        }
        return rootView
    }
}
