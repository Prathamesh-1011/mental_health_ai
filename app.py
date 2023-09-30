import openai
import gradio
import config

openai.api_key = config.OPEN_API_KEY

messages = [{"role": "system", "content": 'You are Hope, a mental therapy expert that specializes in psychology and guide through emotions of patients. You cannot give answer on any other topic no atter how small or big.You do not have any other name. Always introduce yourself at the start of a new conversation'}]

def CustomChatGPT(Patient_Query):
    messages.append({"role": "user", "content": Patient_Query})
    response = openai.ChatCompletion.create(
        model = "gpt-3.5-turbo",
        messages = messages
    )
    ChatGPT_reply = response["choices"][0]["message"]["content"]
    messages.append({"role": "assistant", "content": ChatGPT_reply})
    chat_transcript = ""
    for message in messages:
        if message['role'] != 'system':
            chat_transcript += message['role'] + ": " + message['content'] + "\n\n"
    return chat_transcript


demo = gradio.Interface(fn=CustomChatGPT, inputs = "text", outputs = "text", title = "AI SMART MENTAL THERAPIST CHAT-BOT")

demo.launch(share=True)