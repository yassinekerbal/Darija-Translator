package com.service.translation;

import com.google.genai.Client;
import com.google.genai.types.GenerateContentResponse;

public class Translator {

    private final Client client;

    public Translator() {
        // GOOGLE_API_KEY est lu automatiquement
        client = new Client();
    }

    public String translate(String text) {

        String prompt =
            "Translate the following English text to Moroccan Darija. " +
            "Return only the translation, without explanation:\n" + text;

        GenerateContentResponse response =
            client.models.generateContent(
                "gemini-3-flash-preview",
                prompt,
                null
            );

        return response.text().trim();
    }

}
