package com.example.tracing

import android.content.Intent
import android.os.Bundle
import android.support.v4.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.Response
import com.android.volley.toolbox.*
import kotlinx.android.synthetic.main.order_fragment.view.*


class OrderFragment : Fragment() {
    lateinit var rootView: View

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        rootView = inflater.inflate(R.layout.order_fragment, container, false)
        val queue = Volley.newRequestQueue(activity?.applicationContext)
        val url = "http://192.168.0.108/Cargo2103/neworder.php"
        rootView.order_button.setOnClickListener{
            val stringRequest =object : StringRequest(Request.Method.POST, url, Response.Listener { s ->
                Toast.makeText(activity?.applicationContext,s.toString(),Toast.LENGTH_SHORT).show()
                var intent = Intent(activity?.applicationContext,WebViewActivity::class.java)
                intent.putExtra("data",s.toString())
                startActivity(intent)
            }, Response.ErrorListener { e ->
                Toast.makeText(activity?.applicationContext,e.toString(),Toast.LENGTH_SHORT).show()
            }) {
                override fun getParams(): Map<String, String> = mapOf("email" to rootView.email.text.toString(),
                    "source" to rootView.source.text.toString(),"destination" to rootView.destination_order.text.toString(),
                    "weight" to rootView.quantity_order.text.toString(),"cargo_type" to rootView.cargo_type.text.toString())
            }
            queue.add(stringRequest)
        }
        return rootView
    }
}
