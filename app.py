import openai
import gradio

openai.api_key = config.OPEN_API_KEY

messages = [{"role": "system", "content": 'You are a Mental therapy expert that specializes in psychology and guide through emotions of patient.'}]

def CustomChatGPT(Patient_Query):
    messages.append({"role": "user", "content": Patient_Query})
    response = openai.ChatCompletion.create(
        model = "gpt-3.5-turbo",
        messages = messages
    )
    ChatGPT_reply = response["choices"][0]["message"]["content"]
    messages.append({"role": "assistant", "content": ChatGPT_reply})
    return ChatGPT_reply

demo = gradio.Interface(fn=CustomChatGPT, inputs = "text", outputs = "text", title = "AI SMART MENTAL THERAPIST CHAT-BOT")

demo.launch(share=True)