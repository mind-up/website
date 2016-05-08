$( document ).ready(function() {
    $("#DateLimiteDevis").datepicker();
});

function formInfos()
{
	var formInfos=document.getElementById("formInfos");
	formInfos.style.display = "block";
	var formDevis=document.getElementById("formDevis");
	formDevis.style.display = "none";
	var formRdv=document.getElementById("formRdv");
	formRdv.style.display = "none";
	var formAutre=document.getElementById("formAutre");
	formAutre.style.display = "none";
}

function formDevis()
{
	var formInfos=document.getElementById("formInfos");
	formInfos.style.display = "none";
	var formDevis=document.getElementById("formDevis");
	formDevis.style.display = "block";
	var formRdv=document.getElementById("formRdv");
	formRdv.style.display = "none";
	var formAutre=document.getElementById("formAutre");
	formAutre.style.display = "none";
}

function formRendezVous()
{
	var formInfos=document.getElementById("formInfos");
	formInfos.style.display = "none";
	var formDevis=document.getElementById("formDevis");
	formDevis.style.display = "none";
	var formRdv=document.getElementById("formRdv");
	formRdv.style.display = "block";
	var formAutre=document.getElementById("formAutre");
	formAutre.style.display = "none";
}

function formAutre()
{
	var formInfos=document.getElementById("formInfos");
	formInfos.style.display = "none";
	var formDevis=document.getElementById("formDevis");
	formDevis.style.display = "none";
	var formRdv=document.getElementById("formRdv");
	formRdv.style.display = "none";
	var formAutre=document.getElementById("formAutre");
	formAutre.style.display = "block";
}

function validateDevis(form)
{
	alert("Validation Devis");
	form.submit();
}
function validateInfos(form)
{
	var name=document.getElementsByName("nameInfos");
	var firstname=document.getElementsByName("firstnameInfos");
	var companyName=document.getElementsByName("companyInfos");
	var mail=document.getElementsByName("emailInfos");
	var phone=document.getElementsByName("phoneInfos");
	var message=document.getElementsByName("textContactInfos");
	if(name.innerHTML==undefined || name.innerHTML=="")
	{
		alert("name vide");
		return false;
	}
	if(firstname.value==undefined || firstname.value=="")
	{
		alert("firstname vide");
		return false;
	}
	if(companyName.value==undefined || companyName.value=="")
	{
		alert("companyName vide");
		return false;
	}
	if(phone.value==undefined || phone.value=="")
	{
		alert("phone vide");
		return false;
	}
	if(mail.value==undefined || mail.value=="")
	{
		alert("mail vide");
		return false;
	}
	if(message.value==undefined || message.value=="")
	{
		alert("message vide");
		return false;
	}
	form.submit();
}
function validateAutre(form)
{
	alert("Validation Autre");
	form.submit();
}
function validateRdv(form)
{
	alert("Validation Rdv");
	form.submit();
}
