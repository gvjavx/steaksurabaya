package com.ryzananda.steaksurabaya.Activity.Activity;

import android.annotation.SuppressLint;
import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.ryzananda.steaksurabaya.R;

import org.json.JSONException;
import org.json.JSONObject;

import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

public class SignUpActivity extends AppCompatActivity {
    private EditText edt_username, edt_alamat, edt_tlvn, edt_password, edt_email;
    private TextView edt_dataresult;
    private Button btn_dftr;
    private ProgressBar loading;
    private DatePickerDialog datePickerDialog;
    private SimpleDateFormat dateFormatter;
    private static String URL_REGISTER = "http://192.168.43.78/cafeku/register.php";


    private void showDateDialog() {
        Calendar newCalendar = Calendar.getInstance();
        datePickerDialog = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {

            @Override
            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {

                Calendar newDate = Calendar.getInstance();
                newDate.set(year, monthOfYear, dayOfMonth);

                edt_dataresult.setText(dateFormatter.format(newDate.getTime()));
            }

        }, newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH));

        datePickerDialog.show();
    }


    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        // inisialisasi
        dateFormatter = new SimpleDateFormat("dd-MM-yyyy", Locale.US);
        edt_dataresult = findViewById(R.id.edt_dataresult);
        edt_username = findViewById(R.id.edt_username);
        edt_alamat = findViewById(R.id.edt_alamat);
        edt_password = findViewById(R.id.edt_password);
        edt_tlvn = findViewById(R.id.edt_tlvn);
        edt_email = findViewById(R.id.edt_email);
        btn_dftr = findViewById(R.id.btn_dftr);
        loading = findViewById(R.id.loading);


        dateFormatter = new SimpleDateFormat("dd-MM-yyyy", Locale.US);
        edt_dataresult = (TextView) findViewById(R.id.edt_dataresult);
        edt_dataresult.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showDateDialog();
            }
        });


        btn_dftr.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Daftar();
//                Intent gotoLogin= new Intent(SignUpActivity.this, SignInActivity.class);
//                startActivity(gotoLogin);

            }

        });


    }

    private void Daftar() {
        loading.setVisibility(View.VISIBLE);
        btn_dftr.setVisibility(View.GONE);

        final String username = this.edt_username.getText().toString().trim();
        final String email = this.edt_email.getText().toString().trim();
        final String password = this.edt_password.getText().toString().trim();
        final String tlvn = this.edt_tlvn.getText().toString().trim();
        final String alamat = this.edt_alamat.getText().toString().trim();
        final String tgl = this.edt_dataresult.getText().toString().trim();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_REGISTER,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")) {
                                Intent c = new Intent(SignUpActivity.this, SignInActivity.class);
                                startActivity(c);
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(SignUpActivity.this, "Create Error!" + e.toString(), Toast.LENGTH_SHORT).show();
                            loading.setVisibility(View.GONE);
                            btn_dftr.setVisibility(View.VISIBLE);

                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(SignUpActivity.this, "Create Error!" + error.toString(), Toast.LENGTH_SHORT).show();
                        loading.setVisibility(View.GONE);
                        btn_dftr.setVisibility(View.VISIBLE);

                    }

                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("username", username);
                params.put("email", email);
                params.put("alamat", alamat);
                params.put("tlvn", tlvn);
                params.put("tgl_lahir", tgl);
                params.put("password", password);
                return params;

            }
        };
    }
}
