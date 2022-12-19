window.SERVER = process.env.MIX_SENTRY_DSN_PUBLIC
export const sendRequest = async (url,options)=>{ 
    const fullUrl = window.SERVER + url
    const response = await fetch(fullUrl,options)
    return response
}
