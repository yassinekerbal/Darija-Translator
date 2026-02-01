package com.service.translation;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;

@Path("/translate")
public class TranslatorResource {

    private Translator translator = new Translator();

    @POST
    @Consumes(MediaType.TEXT_PLAIN)
    @Produces(MediaType.TEXT_PLAIN)
    public Response translate(String text) {
        try {
            String result = translator.translate(text);
            return Response.ok(result).build();
        } catch (Exception e) {
            return Response.status(500)
                    .entity("Erreur technique : " + e.getMessage())
                    .build();
        }
    }
}
