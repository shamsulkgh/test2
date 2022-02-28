const axios = require('axios')

const handler = async (event) => {
  const {maxRecords, view} = event.queryStringParameters

  const API_SECRET = process.env.API_SECRET 
  const url = `https://api.airtable.com/v0/appH9pGf1FeVfhzUe/Table1?maxRecords=${maxRecords}&view=${view}`

  try {
    const { data } = await axios.get(url,{
      headers: {
        authorization: API_SECRET,
      },
    });

    return {
      statusCode: 200,
      body: JSON.stringify(data)
    }

  } catch (error) {
    const { status, statusText, headers, data } = error.response
    return {
      statusCode: status,
      body: JSON.stringify({status, statusText, headers, data})
    }
  }
}

module.exports = { handler }
