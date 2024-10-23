const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')

tabs.forEach(tab => {
	tab.addEventListener('click', () => { //everytime we click on the tab, 
	//we want to run the function inside of the curly brackets
	
	const target = document.querySelector(tab.dataset.tabTarget)
	tabContents.forEach(tabContent => {
	tabContent.classList.remove('active')//for each tabContent, remove the 
	//active class (or any tabs that arent being actively used at the moment
	//by removing them all)
	})
	tabs.forEach(tab => {
	tab.classList.remove('active')//for each tab chosen or clicked on, remove 'active'
	//class from the previous tab and...
	})
	tab.classList.add('active') //...place the active class on the current tab
	target.classList.add('active') //only the tab that we click on is 'active' or will display
		
	})
})