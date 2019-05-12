package com.ryzananda.steaksurabaya.remote;

import retrofit2.Retrofit;

public class ApiUtils {

    public static final String BASE_URL ="http://192.168.1.40/cafeku/";

    public static UserService getUserService(){
        return RetrofitClient.getClient(BASE_URL).create(UserService.class);
    }

}
