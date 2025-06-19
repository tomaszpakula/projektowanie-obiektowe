import stripe
from fastapi import FastAPI, HTTPException
import os
from dotenv import load_dotenv
from pydantic import BaseModel
import logging
load_dotenv()
import uvicorn
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

logger = logging.getLogger('uvicorn.error')
logger.setLevel(logging.DEBUG)

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

#set up stripe key from .env
stripe.api_key = os.getenv("STRIPE_API_KEY")

DOMAIN = os.getenv("DOMAIN", "http://localhost:5173/cart")

class Product(BaseModel):
    name: str
    quantity: int
    price: float
    
class Products(BaseModel):
    products: list[Product]
    

@app.post("/create-checkout-session")
def create_checkout_session(products: Products):
    logger.debug("Creating checkout session with products: %s", products)
    try:
        checkout_session = stripe.checkout.Session.create(
            payment_method_types=["card"],
            line_items=[
                {
                    "price_data": {
                        "currency": "pln",
                        "product_data": {
                            "name": product.name,
                        },
                        "unit_amount": int(round(product.price * 100))
                    },
                    "quantity": product.quantity,
                } for product in products.products
            ],
            mode="payment",
            success_url=f"{DOMAIN}?success=true",
            cancel_url=f"{DOMAIN}?canceled=true",
        )
        return {"url" : checkout_session.url}
    except Exception as e:
        logger.exception("Stripe error occurred:")
        raise HTTPException(status_code=500, detail=str(e))
  
@app.get("/success")
def success():
    return {"message": "Payment successful!"}
@app.get("/cancel")
def cancel():
    return {"message": "Payment cancelled!"}

if __name__ == "__main__":
    uvicorn.run(app, port=8000, host="0.0.0.0")