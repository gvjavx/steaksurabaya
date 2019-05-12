package com.ryzananda.steaksurabaya.Activity.Activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.ryzananda.steaksurabaya.R;
import com.ryzananda.steaksurabaya.presenter.ILoginPresenter;
import com.ryzananda.steaksurabaya.presenter.LoginPresenter;
import com.ryzananda.steaksurabaya.remote.ApiUtils;
import com.ryzananda.steaksurabaya.remote.UserService;
import com.ryzananda.steaksurabaya.view.ILoginView;

import butterknife.ButterKnife;
import es.dmoral.toasty.Toasty;

public class SignInActivity extends AppCompatActivity implements ILoginView {
    private static String URL_LOGIN = "http://192.168.1.47/server_sekolah/index.php/api/get_user";
    Button btn_masuk;
    EditText edt_email, edt_pass;
    ProgressBar progressBar2;
    UserService userService;
    ILoginPresenter loginPresenter;
    TextView tv_register;

    private ProgressDialog progressDialog;
    private Context mContext;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_in);
        ButterKnife.bind(this);

        edt_pass= findViewById(R.id.edt_password);
        edt_email=findViewById(R.id.edt_username);
        btn_masuk= findViewById(R.id.btn_masuk);
        tv_register=findViewById(R.id.tv_register);
        userService = ApiUtils.getUserService();
        loginPresenter = new LoginPresenter(this);

        Typeface face=Typeface.createFromAsset(getAssets(),"fonts/Nabila.ttf");
        tv_register.setTypeface(face);



        btn_masuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String email = edt_email.getText().toString();
                String password = edt_pass.getText().toString();
                loginPresenter.onLogin(email, password);
            }
        });
    }

    @Override
    public void onLoginSuccess(String message) {
        Toasty.success(this, message, Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onLoginError(String message) {
        Toasty.error(this, message, Toast.LENGTH_SHORT).show();

            }
        }

