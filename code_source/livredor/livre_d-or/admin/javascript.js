// Affiche ou non un bloc
function option_affiche(id,option)
{
document.getElementById(id).style.display=option;
}

// Affiche la taille présente dans le champ
function taille_value(id)
{
var valeur=document.getElementById('it_'+id).value;
valeur=valeur.replace(/ /gi, '');
valeur=valeur.replace(/px/gi, '');

if(valeur<=35&&valeur>0)
	{
	document.getElementById('t_'+id).src='../images/taille/texte-taille-'+valeur+'.gif';
	document.getElementById('t_'+id).style.display='block';
	}
else
	{
	document.getElementById('t_'+id).style.display='none';
	}
}

// Affiche la couleur présente dans le champ
function couleur_value(id)
{
var valeur=document.getElementById('i_'+id).value;
document.getElementById('c_'+id).style.backgroundColor=valeur;
}

// Affiche la couleur et son code
bloc=true;

function selectionner_couleur(couleur,id)
{
if(bloc)
	{
	document.getElementById(id+'_div').style.backgroundColor=couleur;
	document.getElementById(id+'_div').style.backgroundImage='none';
	document.getElementById(id+'_div').style.border='solid #000000 1px';
	document.getElementById(id+'_input').style.border='solid #000000 1px';
	document.getElementById(id+'_input').value=couleur;
	}
}

// Calcul une valeur hexadécimal
function hexadecimal(valeur)
{
var donnees='0123456789ABCDEF';

valeur=Math.round(Math.min(Math.max(0,valeur),255));
return donnees.charAt((valeur-valeur%16)/16)+donnees.charAt(valeur%16);
}

// Retourne la valeur hexadécimal d'une couleur
function rgbTOhex(r,v,b)
{
return hexadecimal(r)+hexadecimal(v)+hexadecimal(b);
}

// Affiche le dégradé d'une couleur
function degrade(r,v,b,id,noirETblanc)
{
var stop=20;
var blanc=255;
var noir=0;
var i=0;
var i_couleur=0;
var tableau_couleur='';

var dr1=(r-blanc)/9;
var dv1=(v-blanc)/9;
var db1=(b-blanc)/9;

var dr2=r;
var dv2=v;
var db2=b;

if(noirETblanc!=1)
{
while(i<stop)
	{
	i++;

	if(i_couleur==11)
		{
		i_couleur=0;
		}

	if(i==1)
		{
		r=blanc;
		v=blanc;
		b=blanc;
		}
	else if(i<11)
		{
		i_couleur++;
		r=Math.round(blanc+i_couleur*dr1);
		v=Math.round(blanc+i_couleur*dv1);
		b=Math.round(blanc+i_couleur*db1);
		}
	else if(i>10&&i<20)
		{
		if(dr2>0&&i>=11)
			{
			r=Math.round(r-(dr2/9));
			}
		if(dv2>0&&i>=11)
			{
			v=Math.round(v-(dv2/9));
			}
		if(db2>0&&i>=11)
			{
			b=Math.round(b-(db2/9));
			}
		}
	else if(i==20)
		{
		r=noir;
		v=noir;
		b=noir;
		}

	couleur_hexadecimal=rgbTOhex(r,v,b);

	tableau_couleur=tableau_couleur+'<td onClick="if(bloc) { bloc = false; } else { bloc = true; };" onMouseOver="selectionner_couleur(\'#'+couleur_hexadecimal+'\', \'couleur_selectionnee\');" style="width: 11px; height: 18px; background-color: #'+couleur_hexadecimal+'; color: #000000;"></td>';
	}
}

else
{
while(i<stop)
	{
	i++;

	if(i==1)
		{
		r=blanc;
		v=blanc;
		b=blanc;
		}
	else if(i>1&&i<20)
		{
		r=r-12.75;
		v=v-12.75;
		b=b-12.75;
		}
	else if(i==20)
		{
		r=noir;
		v=noir;
		b=noir;
		}

	couleur_hexadecimal=rgbTOhex(r,v,b);

	tableau_couleur=tableau_couleur+'<td onClick="if(bloc) { bloc = false; } else { bloc = true; };" onMouseOver="selectionner_couleur(\'#'+couleur_hexadecimal+'\', \'couleur_selectionnee\');" style="width: 11px; height: 18px; background-color: #'+couleur_hexadecimal+'; color: #000000;"></td>';
	}
}

var tableau_debut='<table><tr>';
var tableau_fin='</tr></table>';

if(bloc)
	{
	document.getElementById(id).innerHTML=tableau_debut+tableau_couleur+tableau_fin;
	}
}

// Suppression des erreurs javascript en cas de script hors ligne
function supprimerErreurs()
{
return true;
}
window.onerror=supprimerErreurs;

// Augmentation/réduction d'un textarea
function taille_textarea(action,id)
{
valeur_actuel=document.getElementById(id).rows;

if(action==1&&valeur_actuel>10)
	{
	document.getElementById(id).rows=valeur_actuel-10;
	}
else if(action==2&&valeur_actuel<20)
	{
	document.getElementById(id).rows=valeur_actuel+10;
	}
}

// Afficher/masquer le formulaire
function basculer(formulaire)
{
etat_actuel=document.getElementById(formulaire).style.display;

	if(etat_actuel=='none')
		{
		document.getElementById(formulaire).style.display='block';
		}
	else
		{
		document.getElementById(formulaire).style.display='none';
		}
}

// Ajout des smiles dans le textarea
function ajouter_texte(texte)
{
	var message=document.getElementById('form_message');

		if (document.selection)
			{
			message.focus();
			selection=document.selection.createRange();
			selection.text=texte;
			}

		else if(message.selectionDebut||message.selectionDebut=='0')
			{
			var startPoste=message.selectionDebut;
			var endPoste=message.selectionFin;
			var chaine=message.value;

			message.value=chaine.substring(0,startPoste)+texte+chaine.substring(endPoste,chaine.length);

			message.selectionDebut=startPoste+texte.length;
			message.selectionFin=endPoste+texte.length;
			message.focus();
			} 

		else
			{
			message.value+=texte;
			message.focus();
			}
}

// Forcer la compatibilité avec Firefox et Opéra
function SelectionObject(Window)
{
	this.window=(Window?Window:window);
	this.document=this.window.document;
}

if(!document.selection)
{
try
	{
	SelectionObject.prototype=
	{
	"clear":function()
		{
		try
			{
			var sel=this.window.getSelection();
			sel.collapse(true);
			sel.dettach();
			} catch(ex) {}
		},

"createRange":function()
{
if (this.type=="none")
		{
		var range="no selection";
		range.text=""; range.htmlText="";
		return range;
		}
		if(!this.activeElement)
		{
		var txt=this.document.getSelection()
		var sel={};

		try
			{
			sel=this.window.getSelection().getRangeAt(0);
			}
		catch(ex) {}
    	var html=getHTMLOfSelection(this.window, this.document);
    	var range=null;

range=new ControlRangeObject();
range.isControlRange=true;
range._text=(""+txt+"");
range._htmlText=html;
range._range=sel;
range.base=sel.commonAncestorContainer?sel.commonAncestorContainer:this.document.body
range.items=new Array();
range.addElement=range.add;

try
{
while(range.base.nodeName.substr(0,1)=="#")
	{
	range.base=range.base.parentNode;
	}

var index=0; var started;
var current=range.base.childNodes[0];
while (current)
	{
	if (started || current==sel.startContainer || current==sel.commonAncestorContainer)
		{
		started=true;
		range.items.push(current);
		}

	if (current == sel.endContainer || current==sel.commonAncestorContainer)
		{
		break;
		}
	index++;
	current=range.base.childNodes[index];
	}
 range.length=range.items.length;
}

catch(ex) {}

return range;
		}

else

	{
	var base=this.activeElement;
	var range=new ControlRangeObject();
	range.isControlRange=false;
	range._text=base.value.substring(base.selectionStart, base.selectionEnd);
	range._htmlText=range._text;
	range._range=null;
	range.base=base;
	range.items=[range.base];
	range.addElement=range.add;

	return range;
	}
}
	}

SelectionObject.prototype.empty=SelectionObject.prototype.clear;
SelectionObject.prototype.createRangeControl=SelectionObject.prototype.createRange;
SelectionObject.prototype.findActiveElement=function()

{
function haveFocus(inp)
	{
	try
		{// IE
var result=!!(inp.hasFocus||inp==document.activeElement);
	if (result)
		{
		return result;
		}
		} catch(ex) {}

	try
		{// FF; Safari
		var sel=false;
		sel=this.window.getSelection().getRangeAt(0);
		if(!sel.collapsed)
			{
			return false;
			}
		var sel2=document.createRange();
		sel2.setStartBefore(inp);
		sel2.setEndBefore(inp);
		var result=sel.compareBoundaryPoints(Range.START_TO_START, sel2)==0;
		result=result && sel.compareBoundaryPoints(Range.END_TO_END, sel2)==0;
		result=result && sel.startOffset == sel2.startOffset
		result=result && sel.endOffset == sel2.endOffset
return result;
		} catch(ex) {}

	try {// Opéra
                return !!(inp.selectionStart||inp.selectionEnd);
		} catch(ex) {}
return false;
	}

try
	{
	var allInputs=this.document.getElementsByTagName("INPUT");
	var allTAreas=this.document.getElementsByTagName("TEXTAREA");
	var l1 = allInputs.length; var l2 = allTAreas.length;
	for(var i=0; i<l1; i++)
		{
		var inp=allInputs[i];
		if(inp.type=="" || inp.type=="text")
			{
			if(haveFocus(inp))
				{
				this.activeElement = inp;
				return "text";
				}
			}
		}

for(var i=0; i<l2; i++)
	{
	var inp=allTAreas[i];
	if(haveFocus(inp))
		{
		this.activeElement = inp;
		return "text";
		}
	}

	if(document.activeElement)
		{
		return document.activeElement;
		}

	} catch(ex) {}
};

SelectionObject.prototype.__defineGetter__("type", function()
	{
	try
		{
		this.activeElement = false;
		var sel = false;
		if((""+this.document.getSelection()+"")=="")
		{
		this.findActiveElement();
		if(this.activeElement)
			{
			return "text";
			}
		}
	try
	{
	sel=this.window.getSelection().getRangeAt(0);
	} catch(ex) {}

if(sel.commonAncestorContainer.nodeName.substr(0,1)=="#")
	{
	return "text";
	}
	else
		{
		return "control";
		}
		} catch(ex)
			{
			}
return "none";
});

SelectionObject.prototype.__defineSetter__("type", function()
{
});

function ControlRangeObject() {}
ControlRangeObject.prototype={
"_text":"",
"_htmlText":"",
"_range":null,
"parentElement":function() {
return this.base;
},
"item":function(i)
{
return this.items[i];
},
"add":function(node)
{
try
	{
	this._range.insertNode(node);
	} catch(ex) {}
},

"execCommand":function(a1,a2,a3,a4)
	{
	var mode=document.designMode;
	document.designMode="on";
	document.execCommand(a1,a2,a3,a4);
	document.designMode=mode;
}
}

ControlRangeObject.prototype.__defineGetter__("text",function()
{
return this._text;
});

ControlRangeObject.prototype.__defineSetter__("text",function(value)
{
if(this.isControlRange)
	{
	var range=this._range;
	var p=document.createTextNode(value);
	range.deleteContents();
	range.insertNode(p)
	try
		{
		document.getSelection().collapseToEnd()
		} catch(ex) {}
	}

else
	{
	var beforeText=this.base.value.substr(0, this.base.selectionStart);
	var middleText=value;
	var afterText=this.base.value.substr(this.base.selectionEnd);
	this.base.value=beforeText+middleText+afterText;
	this.base.selectionStart=beforeText.length + value.length;
	this.base.selectionEnd=this.base.selectionStart;
	this.base.focus();
	}
});

ControlRangeObject.prototype.__defineGetter__("htmlText",function()
{
return this._htmlText
});

ControlRangeObject.prototype.__defineSetter__("htmlText",function(value)
{
var range=this._range;
var p=document.createElement("htmlSection");
p.innerHTML=value;
range.deleteContents();
range.insertNode(p)
});

document.selection=new SelectionObject();
	} catch(ex) {}
}