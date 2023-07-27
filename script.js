const dragArea = document.querySelector('#dragArea')
const imgInp = document.querySelector('#image')
const uploadForm = document.querySelector('.imageUploadForm')

dragArea.addEventListener('dragover' , (e) => {
   e.preventDefault()
})

dragArea.addEventListener('drop', (e) => {
   e.preventDefault()
   imgInp.files = e.dataTransfer.files
   uploadForm.submit()

})


imgInp.addEventListener('change', () => {
   uploadForm.submit()
})




const linkOutput = document.querySelector('.linkOutput').querySelector('span')
const copyToClipBoardBtn = document.querySelector('#copyToClipBoardBtn')

function copyToClipboard() {
   let link = linkOutput.innerText
   navigator.clipboard.writeText(link)

   copyToClipBoardBtn.style.background = 'var(--green)'
   copyToClipBoardBtn.innerText = 'Copied'

   setTimeout(() => {
      copyToClipBoardBtn.style.background = 'var(--blue1)'
      copyToClipBoardBtn.innerText = 'Copy'
   }, 1500);
}


if ( window.location.href.includes('status=loading')) {
   setTimeout(() => {
      window.location.href =  window.location.href.replace('loading','success')
   }, 5000);
}
