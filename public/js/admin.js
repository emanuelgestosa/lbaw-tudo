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
  content.innerHTML = 'Create User'
  /* TODO: Create User content */
}

function openSearchUser() {
  let content = document.getElementById('tab-content')
  content.innerHTML = 'Search User'
  /* TODO: Search User content */
}

function openSearchProject() {
  let content = document.getElementById('tab-content')
  content.innerHTML = 'Search Project'
  /* TODO: Search Project content */
}
