const express = require('express')
const fetch = require('node-fetch')
const app = express()
const axios = require('axios')

app.get('/', async (req, res) => {
  try {

    let data = {
      "shipping_order": {
        "n_packages": "1",
        "content_description": "ORDEN 255826267",
        "imported_id": "255826267",
        "order_price": "24509.0",
        "weight": "0.98",
        "volume": "1.0",
        "type": "delivery"
      },
      "shipping_origin": {
        "warehouse_code": "401"
      },
      "shipping_destination": {
        "customer": {
          "name": "Bernardita Tapia Riquelme",
          "email": "b.tapia@outlook.com",
          "phone": "977623070"
        },
        "delivery_address": {
          "home_address": {
            "place": "Puente Alto",
            "full_address": "SAN HUGO 01324, Puente Alto, Puente Alto"
          }
        }
      },
      "carrier": {
        "carrier_code": "",
        "tracking_number": ""
      }
    };


    const apiResponse = await fetch("https://stage.api.enviame.io/api/s2/v2/companies/401/deliveries", {
      method: "POST",
      headers: {
        "api-key": "ea670047974b650bbcba5dd759baf1ed",
        "Accept": "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data)
    })


    const apiResponseJson = await apiResponse.json()
    console.dir(apiResponseJson)


    let texto = apiResponseJson.carrier_code[0]+ ' ' + apiResponseJson.carrier_code[1]
    //res.send(apiResponseJson.carrier_code[0]+ ' ' + apiResponseJson.carrier_code[1])

    // Insertamos en la bd de la api recien creada

    axios
      .post('http://localhost/api/persistir', {
        texto: texto
      })
      .then((respuesta) => {
        console.log(`statusCode: ${respuesta.statusCode}`)
        console.dir(respuesta)
      })
      .catch((error) => {
        console.log('Error al llamar a persistir')
        console.error(error)
      })   
    res.send('ok');



  } catch (err) {
    console.log(err)
    res.status(500).send('Algo salio mal')
  }
});

app.listen(3000, () => console.log(`Example app listening on port 3000!`))
