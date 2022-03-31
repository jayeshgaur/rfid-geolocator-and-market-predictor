package com.example.tracing

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.support.design.widget.TabLayout
import android.support.v4.view.ViewPager
import android.support.v7.app.AlertDialog
import android.view.Menu
import android.view.MenuInflater
import android.view.MenuItem
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.track_dialog_layout.*

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        setSupportActionBar(toolbar_id)
        val viewPager = findViewById<ViewPager>(R.id.pager)
        val viewPagerAdapter = ViewPagerAdapter(supportFragmentManager)
        viewPagerAdapter.addFragment(OrderFragment(), "Orders")
        viewPagerAdapter.addFragment(SuggestionFragment(), "Suggestions")
        viewPagerAdapter.addFragment(PredictFragment(), "Predictions")
        viewPager.adapter = viewPagerAdapter
        val tabLayout = findViewById<TabLayout>(R.id.tab_id)
        tabLayout.setupWithViewPager(viewPager)
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        val inflater: MenuInflater = menuInflater
        inflater.inflate(R.menu.menu,menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem?): Boolean {
        val queue = Volley.newRequestQueue(this)
        val url = "http://192.168.0.108/Cargo2103/track.php"
        return when(item!!.itemId){
            R.id.about_us->{
                Toast.makeText(this,"About Us",Toast.LENGTH_SHORT).show()
                true
            }
            R.id.contact->{
                Toast.makeText(this,"Contact",Toast.LENGTH_SHORT).show()
                true
            }
            R.id.signout->{
                Toast.makeText(this,"Sign Out",Toast.LENGTH_SHORT).show()
                true
            }
            R.id.track->{
                val builder: AlertDialog.Builder? = this.let {
                    AlertDialog.Builder(it)
                }
                builder?.setView(R.layout.track_dialog_layout)
                val dialog: AlertDialog? = builder?.create()
                dialog!!.show()
                dialog.button.setOnClickListener {
                    dialog.dismiss()
                    val stringRequest =object : StringRequest(Request.Method.POST, url, Response.Listener { s ->
                        Toast.makeText(this,s.toString(),Toast.LENGTH_SHORT).show()
                        var intent = Intent(this,WebViewActivity::class.java)
                        intent.putExtra("data",s.toString())
                        startActivity(intent)
                    }, Response.ErrorListener { e ->
                        Toast.makeText(this,e.toString(),Toast.LENGTH_SHORT).show()
                    }) {
                        override fun getParams(): Map<String, String> = mapOf("trackid" to dialog.order_number_track.text.toString())

                    }
                    queue.add(stringRequest)
                }
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}
