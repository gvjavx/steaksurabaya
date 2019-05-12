package com.ryzananda.steaksurabaya.Activity.Activity;

import android.content.Intent;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageButton;
import android.widget.TextView;


import com.ryzananda.steaksurabaya.ListMenu;
import com.ryzananda.steaksurabaya.R;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;

public class BerandaActivity extends AppCompatActivity {
    TextView tv_menu, tv_deliv, tv_take, tv_promo;
    ImageButton ib_Menu, ib_Take, ib_Deliv, ib_Promo;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_beranda);
        ButterKnife.bind(this);

        tv_deliv=findViewById(R.id.tv_deliv);
        tv_menu=findViewById(R.id.tv_menu);
        tv_promo=findViewById(R.id.tv_promo);
        tv_take=findViewById(R.id.tv_take);
        ib_Deliv=findViewById(R.id.ib_Deliv);
        ib_Menu=findViewById(R.id.ib_Menu);
        ib_Promo=findViewById(R.id.ib_Promo);
        ib_Take=findViewById(R.id.ib_Take);

        Typeface faceD=Typeface.createFromAsset(getAssets(),"fonts/Nabila.ttf");
        tv_deliv.setTypeface(faceD);

        Typeface faceT=Typeface.createFromAsset(getAssets(),"fonts/Nabila.ttf");
        tv_take.setTypeface(faceT);

        Typeface faceM=Typeface.createFromAsset(getAssets(),"fonts/Nabila.ttf");
        tv_menu.setTypeface(faceM);

        Typeface faceP=Typeface.createFromAsset(getAssets(),"fonts/Nabila.ttf");
        tv_promo.setTypeface(faceP);


        ib_Deliv.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent gotomenuDeliv=new Intent(BerandaActivity.this, ListMenu.class);
                startActivity(gotomenuDeliv);
            }
        });

        ib_Take.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent gotomenuTake=new Intent(BerandaActivity.this, ListMenu.class);
                startActivity(gotomenuTake);
            }
        });

        ib_Menu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent gotomenu=new Intent(BerandaActivity.this, ListMenu.class);
                startActivity(gotomenu);
            }
        });
    }


    }

