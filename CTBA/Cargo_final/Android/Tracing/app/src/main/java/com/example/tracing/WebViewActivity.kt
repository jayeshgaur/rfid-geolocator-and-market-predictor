package com.example.tracing

import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.webkit.WebView

class WebViewActivity : AppCompatActivity() {

    private var webView: WebView? = null
    lateinit var data:String
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_web_view)
        webView = findViewById(R.id.webView)
        data = intent.getStringExtra("data")
        if (webView != null) {
            val webSettings = webView!!.settings
            webSettings.javaScriptEnabled = true
            webSettings.builtInZoomControls = true
            webView!!.loadData(data, "text/html", "UTF-8")
        }
    }
}
