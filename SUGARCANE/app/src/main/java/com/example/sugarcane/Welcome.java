package com.example.sugarcane;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import androidx.appcompat.app.AppCompatActivity;

    public class Welcome extends AppCompatActivity {

        Button btnExit;
        @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_welcome);

            btnExit = (Button) findViewById(R.id.btnExit);

            btnExit.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    //perintah untuk mengakhiri aplikasi
                    finish();
                }
            });

        }
    }

