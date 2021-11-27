package com.example.sugarcane;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

public class Register extends AppCompatActivity {

    EditText username, phone, fullname, password, konfirm_password;
    Button btnSignUp;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register);

        username = (EditText) findViewById(R.id.usernameLogout);
        phone = (EditText) findViewById(R.id.phone);
        fullname = (EditText) findViewById(R.id.fullname);
        password = (EditText) findViewById(R.id.passwordlogin);
        konfirm_password = (EditText) findViewById(R.id.confrimPassword);
        btnSignUp = (Button)findViewById(R.id.btnSignUp);

        btnSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String usernameKey = username.getText().toString();
                String phoneKey = phone.getText().toString();
                String fullnameKey = fullname.getText().toString();
                String passwordKey = password.getText().toString();
                String confirmpasswordKey = konfirm_password.getText().toString();

                if (usernameKey.equals("admin") && passwordKey.equals("12345") && phoneKey.equals("082333546213")
                        && fullnameKey.equals("Prasetyo Dwiki Nugroho") && confirmpasswordKey.equals("12345")){
                    //jika register berhasil
                    Toast.makeText(getApplicationContext(), "LOGIN SUKSES",
                            Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(Register.this, MainActivity.class);
                    Register.this.startActivity(intent);
                    finish();
                }else {
                    //jika login gagal
                    AlertDialog.Builder builder = new AlertDialog.Builder(Register.this);
                    builder.setMessage("MAAF REGISTRASI GAGAL")
                            .setNegativeButton("Retry", null).create().show();
                }
            }

        });

    }
}
