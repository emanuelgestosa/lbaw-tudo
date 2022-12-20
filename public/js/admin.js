/* main tabs navigation */
let tabs = document.getElementsByClassName('tab')

Array.from(tabs).forEach(e => {
  e.addEventListener('click', function(e) {
    if (e.currentTarget.classList.contains('selected')) {
      /* its already selected, do nothing */
      return
    }
    selected = document.getElementsByClassName('selected')
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
      selected = document.getElementsByClassName('sub-tab selected') 
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

function openBans() {
  let content = document.getElementById('tab-content')
  content.innerHTML = 'Bans'
  /* TODO: Bans content */
}

function openCreateUser() {
  let content = document.getElementById('tab-content')

  /* create form */
  let form = document.createElement('form')
  form.setAttribute('method', 'POST')
  form.setAttribute('action', '/api/user')

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

  /* submit button */
  let submit = document.createElement('button')
  submit.setAttribute('type', 'submit')
  submit.innerText = 'Create'

  /* csrf token */
  let token = document.createElement('input')
  token.setAttribute('type', 'hidden')
  token.setAttribute('name', '_token')
  token.setAttribute('value', document.querySelector('meta[name="csrf-token"]').content)

  /* build form */
  form.appendChild(token)
  form.appendChild(labelName)
  form.appendChild(inputName)
  form.appendChild(labelUsername)
  form.appendChild(inputUsername)
  form.appendChild(labelMail)
  form.appendChild(inputMail)
  form.appendChild(labelPhone)
  form.appendChild(inputPhone)
  form.appendChild(labelPassword)
  form.appendChild(inputPassword)
  form.appendChild(labelPasswordC)
  form.appendChild(inputPasswordC)
  form.appendChild(submit)

  content.innerHTML = ''
  content.appendChild(form)
}

function openSearchUser() {
  let content = document.getElementById('tab-content')
  content.innerHTML = '<div class="search_bar"><i class="fa-solid fa-search"></i><input class="search-user" type="text" placeholder="Search user..."></div><section class="user-results" style="display:hidden"></section>'
}

function openSearchProject() {
  let content = document.getElementById('tab-content')
  content.innerHTML = 'Search Project'
  /* TODO: Search Project content */
}
