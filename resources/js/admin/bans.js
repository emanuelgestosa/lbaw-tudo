import {sendRequest} from '../app.js'
import {addSearchUsersFunctionality} from './searchUsers.js'

/* section opened when page is visited */
openBans()

/* main tabs navigation */
let tabs = document.getElementsByClassName('tab')

Array.from(tabs).forEach(e => {
  e.addEventListener('click', function(e) {
    if (e.currentTarget.classList.contains('selected')) {
      /* its already selected, do nothing */
      return
    }
    let selected = document.getElementsByClassName('selected')
    Array.from(selected).forEach(s => {
      s.className = s.className.replace(' selected', '')
    })
    e.currentTarget.className += ' selected'
    if (e.currentTarget.id == 'tab-user') {
      let subtab_bans = document.createElement('button')
      let subtab_create = document.createElement('button')
      let subtab_search = document.createElement('button')
      subtab_bans.classList.add('sub-tab')
      subtab_bans.classList.add('selected')
      subtab_bans.id = "sub-tab-bans"
      subtab_bans.innerHTML = '<i class="fa-solid fa-ban"></i> Banned Users'
      subtab_create.classList.add('sub-tab')
      subtab_create.innerHTML = '<i class="fa-solid fa-plus"></i> Create User'
      subtab_create.id = "sub-tab-createuser"
      subtab_search.classList.add('sub-tab')
      subtab_search.innerHTML = '<i class="fa-solid fa-search"></i> Search User'
      subtab_search.id = "sub-tab-searchuser"
      let sub_tabs = document.getElementById('sub-tabs')
      sub_tabs.innerHTML = ''
      sub_tabs.appendChild(subtab_bans)
      sub_tabs.appendChild(subtab_create)
      sub_tabs.appendChild(subtab_search)
      openBans()
    } else if (e.currentTarget.id == 'tab-project') {
      let subtab_search = document.createElement('button')
      subtab_search.classList.add('sub-tab')
      subtab_search.classList.add('selected')
      subtab_search.innerHTML = '<i class="fa-solid fa-search"></i> Search Project'
      subtab_search.id = "sub-tab-searchproject"
      let sub_tabs = document.getElementById('sub-tabs')
      sub_tabs.innerHTML = ''
      sub_tabs.appendChild(subtab_search)
      openSearchProject()
    }
    subTabsNav()
  })
})

subTabsNav()

/* sub-tabs navigation */
function subTabsNav() {
  let sub_tabs = document.getElementsByClassName('sub-tab')
  
  Array.from(sub_tabs).forEach(e => {
    e.addEventListener('click', function(e) {
      let selected = document.getElementsByClassName('sub-tab selected') 
      Array.from(selected).forEach(s => {
        s.className = s.className.replace(' selected', '')
      })
      e.currentTarget.className += ' selected'
      if (e.currentTarget.id == 'sub-tab-bans') {
        openBans()
      } else if (e.currentTarget.id == 'sub-tab-createuser') {
        openCreateUser()
      } else if (e.currentTarget.id == 'sub-tab-searchuser') {
        openSearchUser()
      } else if (e.currentTarget.id == 'sub-tab-searchproject') {
        openSearchProject()
      }
    })
  })
}

async function openBans() {
  let content = document.getElementById('tab-content')
  content.innerHTML = ''
  let banButton = document.createElement('button');
  banButton.addEventListener('click', async () => {
    let url = '/api/user/ban'
    const rawResponse = await sendRequest(url,{
      method: 'POST',
      headers: {
        'Accept': 'application:json',
        'Content-Type': 'application:json'
      },
      body: JSON.stringify({
        id_users:  5,
        id_administrator: 1,
        end_date: '2024-01-01',
        reason: 'asdsada'
      })
    })
  })
  content.appendChild(banButton)
  let url = '/api/bans'
  let rawResponse = await sendRequest(url,{method:"GET"})
  const contents = await rawResponse.json()
  const currDate = new Date()
  currDate.setHours(0,0,0,0)
  for (const key in contents) {
    const end_date = new Date(contents[key]['end_date'])
    if (end_date.getTime() < currDate.getTime()) {
      continue
    }
    let url = '/api/user/' + contents[key]['id_users'] + '/json'
    rawResponse = await sendRequest(url,{method:"GET"})
    const userInfo = await rawResponse.json()

    url = '/api/admin/' + contents[key]['id_administrator'] + '/json'
    rawResponse = await sendRequest(url,{method:"GET"})
    const adminInfo = await rawResponse.json()

    const banItem = document.createElement('article')
    banItem.id = contents[key]['id']
    const user = document.createElement('p')
    user.innerHTML = `
      User: 
      <a href="/user/` + userInfo['user']['id'] + `">` + userInfo['user']['username'] + `</a>
    `
    const admin = document.createElement('p')
    admin.innerHTML = `
      Banned by: 
      <a href="/user/` + adminInfo['user']['id'] + `">` + adminInfo['user']['username'] + `</a>
    `
    const reason = document.createElement('p')
    reason.innerText = 'Reason: ' + contents[key]['reason']
    const date = document.createElement('p')
    date.innerText = 'Banned until: ' + contents[key]['end_date']

    const removeBanButton = document.createElement('button')
    removeBanButton.innerHTML = '<i class="fa-solid fa-times"></i> Remove Ban'
    removeBanButton.addEventListener('click', async (e) => {
      console.log(e.currentTarget.parentNode.id)
      let url = '/api/bans'
      rawResponse = await sendRequest(url.toString(), {
        method: 'DELETE',
        headers: {
          'Accept': 'application:json',
          'Content-Type': 'application:json'
        },
        body: JSON.stringify({
          id: e.currentTarget.parentNode.id
        })
      })
      openBans()
    })

    banItem.appendChild(user)
    banItem.appendChild(admin)
    banItem.appendChild(reason)
    banItem.appendChild(date)
    banItem.appendChild(removeBanButton)
    content.appendChild(banItem)
  }
}

function openCreateUser() {
  let content = document.getElementById('tab-content')

  /* create form */
  let form = document.createElement('form')
  form.setAttribute('action', 'javascript:void(0);')

  /* create labels */
  let labelName = document.createElement('label')
  labelName.setAttribute('for', 'name')
  labelName.innerText = 'Name'
  let labelUsername = document.createElement('label')
  labelUsername.setAttribute('for', 'username')
  labelUsername.innerText = 'Username'
  let labelMail = document.createElement('label')
  labelMail.setAttribute('for', 'email')
  labelMail.innerText = 'E-Mail Address'
  let labelPhone = document.createElement('label')
  labelPhone.setAttribute('for', 'phone_number')
  labelPhone.innerText = 'Phone Number'
  let labelPassword = document.createElement('label')
  labelPassword.setAttribute('for', 'password')
  labelPassword.innerText = 'Password'
  let labelPasswordC = document.createElement('label')
  labelPasswordC.setAttribute('for', 'password-confirm')
  labelPasswordC.innerText = 'Confirm Password'

  /* create inputs */
  let inputName = document.createElement('input')
  inputName.id = 'name'
  inputName.setAttribute('type', 'text')
  inputName.setAttribute('name', 'name')
  inputName.setAttribute('required', 'required')
  inputName.setAttribute('autofocus', 'autofocus')
  let inputUsername = document.createElement('input')
  inputUsername.id = 'username'
  inputUsername.setAttribute('type', 'text')
  inputUsername.setAttribute('name', 'username')
  inputUsername.setAttribute('required', 'required')
  let inputMail = document.createElement('input')
  inputMail.id = 'email'
  inputMail.setAttribute('type', 'email')
  inputMail.setAttribute('name', 'email')
  inputMail.setAttribute('required', 'required')
  let inputPhone = document.createElement('input')
  inputPhone.id = 'phone_number'
  inputPhone.setAttribute('type', 'text')
  inputPhone.setAttribute('name', 'phone_number')
  inputPhone.setAttribute('required', 'required')
  let inputPassword = document.createElement('input')
  inputPassword.id = 'password'
  inputPassword.setAttribute('type', 'password')
  inputPassword.setAttribute('name', 'password')
  inputPassword.setAttribute('required', 'required')
  let inputPasswordC = document.createElement('input')
  inputPasswordC.id = 'password-confirm'
  inputPasswordC.setAttribute('type', 'password')
  inputPasswordC.setAttribute('name', 'password_confirmation')
  inputPasswordC.setAttribute('required', 'required')

  /* error messages */
  let errorName = document.createElement('span')
  errorName.className = 'error'
  errorName.id = 'error-name'
  errorName.style.color = 'red'
  let errorUsername = document.createElement('span')
  errorUsername.className = 'error'
  errorUsername.id = 'error-username'
  errorUsername.style.color = 'red'
  let errorMail = document.createElement('span')
  errorMail.className = 'error'
  errorMail.id = 'error-mail'
  errorMail.style.color = 'red'
  let errorPhone = document.createElement('span')
  errorPhone.className = 'error'
  errorPhone.id = 'error-phone'
  errorPhone.style.color = 'red'
  let errorPassword = document.createElement('span')
  errorPassword.className = 'error'
  errorPassword.id = 'error-password'
  errorPassword.style.color = 'red'

  /* submit button */
  let submit = document.createElement('button')
  submit.setAttribute('type', 'submit')
  submit.innerText = 'Create'

  /* build form */
  form.appendChild(labelName)
  form.appendChild(inputName)
  form.appendChild(errorName)
  form.appendChild(labelUsername)
  form.appendChild(inputUsername)
  form.appendChild(errorUsername)
  form.appendChild(labelMail)
  form.appendChild(inputMail)
  form.appendChild(errorMail)
  form.appendChild(labelPhone)
  form.appendChild(inputPhone)
  form.appendChild(errorPhone)
  form.appendChild(labelPassword)
  form.appendChild(inputPassword)
  form.appendChild(errorPassword)
  form.appendChild(labelPasswordC)
  form.appendChild(inputPasswordC)
  form.appendChild(submit)

  form.addEventListener('submit', async () => {
    let url =  '/api/user'
    const rawResponse = await sendRequest(url.toString(), {
      method: 'POST',
      headers: {
        'Accept': 'application:json',
        'Content-Type': 'application:json'
      },
      body: JSON.stringify({
        name: inputName.value,
        username: inputUsername.value,
        email: inputMail.value,
        phone_number: inputPhone.value,
        password: inputPassword.value,
        password_confirmation: inputPasswordC.value
      })
    })
    const contents = await rawResponse.json()
    if (!contents['success']) {
      const inputs = document.querySelectorAll('form > input')
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].style.borderColor = '#d1d1d1'
      }
      const errors = document.querySelectorAll('.error')
      for (let i = 0; i < errors.length; i++) {
        errors[i].innerText = ''
      }
      for (let error in contents['error']) {
        if (error == 'name') {
          errorName = document.getElementById('error-name')
          document.getElementById('name').style.borderColor = 'red'
          errorName.textContent = contents['error'][error][0]
        } else if (error == 'username') {
          errorUsername = document.getElementById('error-username')
          document.getElementById('username').style.borderColor = 'red'
          errorUsername.textContent = contents['error'][error][0]
        } else if (error == 'email') {
          errorMail = document.getElementById('error-mail')
          document.getElementById('email').style.borderColor = 'red'
          errorMail.textContent = contents['error'][error][0]
        } else if (error == 'phone_number') {
          errorPhone = document.getElementById('error-phone')
          document.getElementById('phone_number').style.borderColor = 'red'
          errorPhone.textContent = contents['error'][error][0]
        } else if (error == 'password') {
          errorPassword = document.getElementById('error-password')
          document.getElementById('password').style.borderColor = 'red'
          errorPassword.textContent = contents['error'][error][0]
        }
      }
    } else {
      const p = document.createElement('p')
      p.innerText = 'Account created with success!'
      content.innerHTML = ''
      content.appendChild(p)
    }
  })

  content.innerHTML = ''
  content.appendChild(form)
}

async function openSearchUser() {
  let content = document.getElementById('tab-content')
  content.innerHTML = '
        <div class="search_bar">
        <i class="fa-solid fa-search"></i>
        <input class="search-user" type="text" placeholder="Search user...">
        </div>
        <section class="user-results" style="display:hidden"></section>'
  addSearchUsersFunctionality()
}

function openSearchProject() {
  let content = document.getElementById('tab-content')
  content.innerHTML = 'Search Project'
  /* TODO: Search Project content */
}
