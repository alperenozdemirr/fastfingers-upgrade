//alert("test..");
  const word_pool=["üzerine","insan","yan","olmak","hemen","çünkü","ise","değil","iki","doğru",
  "durum","orta","arkadaş","yapmak","bunun","ürün","yazılım","php","tek","alt","çıkmak","anlatmak",
  "saat","anne","baba","öğretmen","sağlamak","atmak","durmak","uzun","demek","karşı","kendi","güzel",
  "sorun","kişi","içinde","çekmek","kapı","pencere","bilgisayar","yazılım","teknoloji","laptop","devlet",
  "kullanmak","zaman","olmak","yüzde","hayat","görmek","kullanmak","başlamak","öyle","önemli","arkadaş",
  "önce","karşı","gerekmek","bugün","yarın","bilgi","ülke","dünya","hızlı","yapılmak","konuşmak","açmak",
  "taraf","dış","gitmek","sormak","yol","sıra","düşünmek","bugün","para","dolar","hiçbir","burada","tüm",
  "hayvan","durum","süre","durmak","araba","bisiklet","sahip","hiç","iş","olay","bakmak","dış","yaşamak",
  "yıl","çalışmak","şirket","fazla","bulmak","sadece","geçmek","bırakmak","çevre","mühendis","mimar",
  "koymak","sonuç","tahlil","şekil","üçgen","kare","daire","kapı","beklemek","tutmak","getirmek",
  "gibi","sezon","sonbahar","oturmak","bunlar","almak","nasıl","genç","ihtiyar","kendi","doğru","yanlış",
  "atılmak","gece","gündüz","kuzey","yemek","uyuklamak","yaşamak","düşmek","atlamak","danışmak","görüşmek",
  "sevgili","kamyon","siyaset","bilim","sistem","makine","başlamak","bilmek","üzerine","sonuç",
  "birisi","güzel","çirkin","saat","dakika","kronometre","dönem","açmak","sevilmek","köpek",
  "çekmek","bütün","düşmek","konuşmak","onlar","etmek","kız","para","yazmak","diğer","hemen",
  "göstermek","küçük","büyük","adam","küçük","büyük","bu","var","oturmak","içinde","sevmek",
  "var","sen","diğer","bilgi","duymak","tatmak"
 ];
  var words= [];
  function randomWord(){
  	for(var j=0;j<word_pool.length;j++){
 	 var randomİndex=Math.floor(Math.random() * word_pool.length);
  	words.push(word_pool[randomİndex]);
  }
  for(var i=0;i<words.length;i++){
	screenWords.appendChild(createWordSpan(words[i],i));
}
  }
  
  
//var wordsLength=words.length;
var screenWords=document.getElementById('words');
var inputWords= document.getElementById('inputWords');
var kronometre=document.getElementById('kronometre');
var keyupText   =document.getElementById('keyupText');
var trueWordText=document.getElementById('trueWordText');
var falseWordText=document.getElementById('falseWordText');
var resultText=document.getElementById('resultText');
var tryBtn=document.getElementById("tryBtn");
var resultScreen=document.getElementById("resultScreen");

var keyupInput   =document.getElementById('keyupInput');
var trueWordInput=document.getElementById('trueWordInput');
var falseWordInput=document.getElementById('falseWordInput');
var btn2NewScore=document.getElementById('newScore');


function createWordSpan(name,i) {
	const span = document.createElement('span');
	span.textContent=name;
	span.setAttribute("id","nr"+i);
	return span;
}
function startKronomerte(){
const intervalID = setInterval(start,1000);
//clearInterval(intervalID);
}
function stopKronometre() {
 clearInterval(intervalID);
}
randomWord();
resultScreen.style.display="none";

//counters
var wordCounter=0;
var keyupCounter=0;
var trueWord=0;
var falseWord=0;
var start_time="1:00";
var timeValue=60;
var	time=timeValue;
keyupText.innerHTML=0;
trueWordText.innerHTML=0;
falseWordText.innerHTML=0;
kronometre.innerHTML=start_time;
function start() {
	if(time!=0){
		time--;
		kronometre.innerHTML=time;
		btn2NewScore.disabled=false;
		
	}else{
		screenWords.style.display="none";
		inputWords.disabled=true;
		resultScreen.style.display="block";
		keyupText.innerHTML=keyupCounter;
		trueWordText.innerHTML=trueWord;
		falseWordText.innerHTML=falseWord;
		resultText.innerHTML=trueWord+" NET";
	
		keyupInput.value=keyupCounter/timeValue;
		trueWordInput.value=trueWord;
		falseWordInput.value=falseWord;
	}
	
}
function reststart(){
	
	//screenWords.appendChild(createWordSpan(words[i],i));

  	document.getElementById("words").innerHTML="";
  	words=[];
	//document.querySelector('#nr'+wordCounter).classList.remove('pointer');
	randomWord();
	screenWords.style.display="block";
	inputWords.value="";
	inputWords.disabled=false;

	time=timeValue;

	wordCounter=0;
	keyupCounter=0;
	trueWord=0;
	falseWord=0;
		var link = "nr"+wordCounter;
	var linkPos = $("#"+link+"").position().top;
	var cur_pos = $('#words').scrollTop();
	var total_scroll=cur_pos+linkPos;
	$("#words").scrollTop(total_scroll);
}


document.querySelector('#nr'+wordCounter).classList.add('pointer');
inputWords.addEventListener('keydown', (event) => {
	keyupCounter++;

	if(time==timeValue){
		if(keyupCounter==1){
		 startKronomerte();
		}
	}
	
	var link = "nr"+wordCounter;
	var linkPos = $("#"+link+"").position().top;
	var cur_pos = $('#words').scrollTop();
	var total_scroll=cur_pos+linkPos;
	$("#words").scrollTop(total_scroll);
	document.getElementById("nr"+wordCounter).style.color="green";
	document.querySelector('#nr'+wordCounter).classList.add('pointer');
	//space basılırsa olsun
	if (event.keyCode==32) {
		if (inputWords.value==words[wordCounter]) {
			document.querySelector('#nr'+wordCounter).classList.remove('pointer');
			trueWord++;
			
			//console.log(trueWord);
			wordCounter++;
			inputWords.value="";
			
		}else{
			document.getElementById("nr"+wordCounter).style.color="red";
			document.querySelector('#nr'+wordCounter).classList.remove('pointer');
			wordCounter++;
			falseWord++;
			inputWords.value="";
			//false hesaplamasını time'dan sonra yap
			//falseWord++;
			//console.log(falseWord);
		}
	}
})
inputWords.addEventListener('keyup', (event) => {
	if (event.keyCode==32) {
		inputWords.value="";
	}
})
tryBtn.onclick = function(){

	reststart();

}

function userPanelOpen(){	
	document.getElementById("user-info").style.display = "block";
}
function userPanelClose(){
	document.getElementById("user-info").style.display = "none";
}

var changeOpen = document.getElementById("changeOpen");
var changeClose=document.getElementById("changeClose");
var changeContanier=document.getElementById("changeİmgContanier");
changeContanier.style.display="none";


changeClose.onclick = function(){
	changeContanier.style.display="none";
}
changeOpen.onclick = function(){
	changeContanier.style.display="block";
	changeContanier.style.display="flex";
changeContanier.style.justifyContent="center";
changeContanier.style.alignItems="center";
}

var passwordOpen=document.getElementById("passwordOpen");
var passwordClose=document.getElementById("passwordClose");

passwordOpen.onclick = function(){
	document.getElementById("changePassword").style.display="block";

}
passwordClose.onclick = function(){
	document.getElementById("changePassword").style.display="none";
}





