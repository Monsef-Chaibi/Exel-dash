<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
      <meta name="author" content="hp" />
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style2 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style5 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      th.style5 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      td.style6 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      th.style6 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      td.style7 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      th.style7 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      td.style8 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style8 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style9 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style9 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style10 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      th.style10 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      td.style11 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      th.style11 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      td.style12 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      th.style12 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:11pt; background-color:#FFFFFF }
      td.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style14 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style14 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style15 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style15 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style16 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style16 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style18 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Andalus'; font-size:13pt; background-color:#FFFFFF }
      th.style18 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Andalus'; font-size:13pt; background-color:#FFFFFF }
      td.style19 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style19 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style20 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style20 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style21 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      th.style21 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      td.style22 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      th.style22 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      td.style23 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style23 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style24 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style24 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style25 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style25 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style26 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      th.style26 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      td.style27 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      th.style27 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      td.style28 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      th.style28 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Andalus'; font-size:16pt; background-color:#FFFFFF }
      td.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      th.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:16pt; background-color:#FFFFFF }
      td.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:#FFFFFF }
      th.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:16pt; background-color:#FFFFFF }
      td.style32 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style32 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style33 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style33 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style35 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style35 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style37 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style37 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style38 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:#FFFFFF }
      th.style38 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:#FFFFFF }
      td.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:#FFFFFF }
      th.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:#FFFFFF }
      td.style40 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      th.style40 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      td.style41 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      th.style41 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
      td.style42 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style42 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style43 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      th.style43 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FFFFFF }
      td.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFFFF }
      th.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFFFF }
      td.style45 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFFFF }
      th.style45 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:14pt; background-color:#FFFFFF }
      td.style46 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style46 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style47 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style47 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style48 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:#FFFFFF }
      th.style48 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:#FFFFFF }
      td.style49 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:#FFFFFF }
      th.style49 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:#FFFFFF }
      td.style50 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:#FFFFFF }
      th.style50 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:#FFFFFF }
      td.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style54 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style54 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style55 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style55 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      td.style56 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      th.style56 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:12pt; background-color:#FFFFFF }
      table.sheet0 col.col0 { width:42pt }
      table.sheet0 col.col1 { width:42pt }
      table.sheet0 col.col2 { width:42pt }
      table.sheet0 col.col3 { width:42pt }
      table.sheet0 col.col4 { width:42pt }
      table.sheet0 col.col5 { width:42pt }
      table.sheet0 col.col6 { width:42pt }
      table.sheet0 col.col7 { width:42pt }
      table.sheet0 col.col8 { width:42pt }
      table.sheet0 col.col9 { width:42pt }
      table.sheet0 col.col10 { width:42pt }
      table.sheet0 col.col11 { width:42pt }
      table.sheet0 col.col12 { width:42pt }
      table.sheet0 col.col13 { width:42pt }
      table.sheet0 col.col14 { width:42pt }
      table.sheet0 col.col15 { width:42pt }
      table.sheet0 col.col16 { width:42pt }
      table.sheet0 col.col17 { width:42pt }
      table.sheet0 col.col18 { width:42pt }
      table.sheet0 col.col19 { width:42pt }
      table.sheet0 col.col20 { width:42pt }
      table.sheet0 col.col21 { width:42pt }
      table.sheet0 col.col22 { width:42pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row5 { height:21pt }
      table.sheet0 tr.row6 { height:15pt }
      table.sheet0 tr.row11 { height:22.8pt }
      table.sheet0 tr.row12 { height:27pt }
      table.sheet0 tr.row13 { height:21pt }
      table.sheet0 tr.row14 { height:27pt }
      table.sheet0 tr.row15 { height:21pt }
      table.sheet0 tr.row16 { height:25.8pt }
      table.sheet0 tr.row17 { height:15.6pt }
      table.sheet0 tr.row18 { height:15.6pt }
      table.sheet0 tr.row19 { height:18pt }
      table.sheet0 tr.row20 { height:15.6pt }
      table.sheet0 tr.row21 { height:15.6pt }
      table.sheet0 tr.row22 { height:31.2pt }
      table.sheet0 tr.row23 { height:15.6pt }
      table.sheet0 tr.row24 { height:15.6pt }
      table.sheet0 tr.row25 { height:15.6pt }
      table.sheet0 tr.row26 { height:16.2pt }
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0.7in; margin-right: 0.7in; margin-top: 0.75in; margin-bottom: 0.75in; }
body { margin-left: 0.7in; margin-right: 0.7in; margin-bottom: 0.75in; }
</style>
    <table style="height: 1200px;width:800px" border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <col class="col14">
        <col class="col15">
        <col class="col16">
        <col class="col17">
        <col class="col18">
        <col class="col19">
        <col class="col20">
        <col class="col21">
        <col class="col22">
        <tbody>
          <tr class="row0">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1"><img style="height: 100px" src="{{ asset('img/logo2.jpg') }}" alt="Example Image">            </td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style1 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style1 null"><img style="height: 100px" src="{{ asset('img/logo1.jpg') }}" alt="Example Image">            </td>
          </tr>
          <tr class="row5">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style2 null"></td>
            <td class="column9 style3 s style3" colspan="6">نموذج رخص سير</td>
            <td class="column15 style2 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style1 null"></td>
          </tr>
          <tr class="row6">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
            <td class="column10 style1 null"></td>
            <td class="column11 style1 null"></td>
            <td class="column12 style1 null"></td>
            <td class="column13 style1 null"></td>
            <td class="column14 style1 null"></td>
            <td class="column15 style1 null"></td>
            <td class="column16 style1 null"></td>
            <td class="column17 style1 null"></td>
            <td class="column18 style1 null"></td>
            <td class="column19 style1 null"></td>
            <td class="column20 style1 null"></td>
            <td class="column21 style1 null"></td>
            <td class="column22 style1 null"></td>
          </tr>
          <tr class="row7">
            <td class="column0 style4 null"></td>
            <td class="column1 style4 null"></td>
            <td class="column2 style4 null"></td>
            <td class="column3 style4 null"></td>
            <td class="column4 style4 null"></td>
            <td class="column5 style4 null"></td>
            <td class="column6 style4 null"></td>
            <td class="column7 style4 null"></td>
            <td class="column8 style4 null"></td>
            <td class="column9 style4 null"></td>
            <td class="column10 style4 null"></td>
            <td class="column11 style4 null"></td>
            <td class="column12 style4 null"></td>
            <td class="column13 style4 null"></td>
            <td class="column14 style4 null"></td>
            <td class="column15 style4 null"></td>
            <td class="column16 style4 null"></td>
            <td class="column17 style4 null"></td>
            <td class="column18 style4 null"></td>
            <td class="column19 style4 null"></td>
            <td class="column20 style4 null"></td>
            <td class="column21 style4 null"></td>
            <td class="column22 style4 null"></td>
          </tr>
          <tr class="row8">
            <td class="column0 style5 null style12" colspan="19" rowspan="2"></td>
            <td class="column19 style8 null"></td>
            <td class="column20 style9 s style9" colspan="3" rowspan="2">نوع الإجراء</td>
          </tr>
          <tr class="row9">
            <td class="column19 style8 null"></td>
          </tr>
          <tr class="row10">
            <td class="column0 style8 null"></td>
            <td class="column1 style8 null"></td>
            <td class="column2 style8 null"></td>
            <td class="column3 style8 null"></td>
            <td class="column4 style8 null"></td>
            <td class="column5 style8 null"></td>
            <td class="column6 style8 null"></td>
            <td class="column7 style8 null"></td>
            <td class="column8 style8 null"></td>
            <td class="column9 style8 null"></td>
            <td class="column10 style8 null"></td>
            <td class="column11 style8 null"></td>
            <td class="column12 style8 null"></td>
            <td class="column13 style8 null"></td>
            <td class="column14 style8 null"></td>
            <td class="column15 style8 null"></td>
            <td class="column16 style8 null"></td>
            <td class="column17 style8 null"></td>
            <td class="column18 style8 null"></td>
            <td class="column19 style8 null"></td>
            <td class="column20 style8 null"></td>
            <td class="column21 style8 null"></td>
            <td class="column22 style8 null"></td>
          </tr>
          <tr class="row11">
            <td class="column0 style13 s style14" colspan="6">سعودية</td>
            <td class="column6 style15 s style15" colspan="3">الجنسية /</td>
            <td class="column9 style16 f style17" colspan="11">0</td>
            <td class="column20 style18 null"></td>
            <td class="column21 style19 s style20" colspan="2">الإسم رباعيا /</td>
          </tr>
          <tr class="row12">
            <td class="column0 style21 f style22" colspan="6">0</td>
            <td class="column6 style15 s style17" colspan="3">هاتف المنزل /</td>
            <td class="column9 style23 f">0</td>
            <td class="column10 style23 f">0</td>
            <td class="column11 style23 f">0</td>
            <td class="column12 style23 f">0</td>
            <td class="column13 style23 f">0</td>
            <td class="column14 style23 f">0</td>
            <td class="column15 style23 f">0</td>
            <td class="column16 style23 f">0</td>
            <td class="column17 style23 f">0</td>
            <td class="column18 style23 f">0</td>
            <td class="column19 style24 s style24" colspan="4">البطاقة الشخصية /</td>
          </tr>
          <tr class="row13">
            <td class="column0 style25 n style14" colspan="6">6930000</td>
            <td class="column6 style15 s style15" colspan="3">هاتف العمل /</td>
            <td class="column9 style16 s style15" colspan="4">جدة</td>
            <td class="column13 style15 s style17" colspan="3">المدينة /</td>
            <td class="column16 style16 s style15" colspan="4">حي الصفا</td>
            <td class="column20 style15 s style17" colspan="3">العنوان /</td>
          </tr>
          <tr class="row14">
            <td class="column0 style26 f style28" colspan="13">=[1]Registration!AM18</td>
            <td class="column13 style15 s style17" colspan="3">رقم الجوال /</td>
            <td class="column16 style16 s style15" colspan="4">تجارة السيارات</td>
            <td class="column20 style15 s style17" colspan="3">النشاط /</td>
          </tr>
          <tr class="row15">
            <td class="column0 style29 f style30" colspan="5">=[1]Registration!AP16</td>
            <td class="column5 style15 s style17" colspan="3">رقم الهوية /</td>
            <td class="column8 style31 f style31" colspan="3">0</td>
            <td class="column11 style31 f style31" colspan="3">0</td>
            <td class="column14 style31 f style31" colspan="3">0</td>
            <td class="column17 style31 f style31" colspan="3">0</td>
            <td class="column20 style32 s style33" colspan="3">إسم المستأجر /</td>
          </tr>
          <tr class="row16">
            <td class="column0 style34 f style35" colspan="3">0</td>
            <td class="column3 style36 s style37" colspan="3">تاريخ الدخول/</td>
            <td class="column6 style16 f style15" colspan="3">0</td>
            <td class="column9 style15 s style17" colspan="3">ميناء الدخول /</td>
            <td class="column12 style38 s style39" colspan="8">1020338292</td>
            <td class="column20 style15 s style17" colspan="3">بطاقة الجمارك /</td>
          </tr>
          <tr class="row17">
            <td class="column0 style34 f style35" colspan="3">0</td>
            <td class="column3 style40 s style41" colspan="3">تاريخ التسجيل/</td>
            <td class="column6 style16 s style15" colspan="3">خصوصي</td>
            <td class="column9 style15 s style17" colspan="3">نوع التسجيل /</td>
            <td class="column12 style16 null style15" colspan="8"></td>
            <td class="column20 style15 s style17" colspan="3">اللوحة الحرفية /</td>
          </tr>
          <tr class="row18">
            <td class="column0 style16 s style15" colspan="3">كامري</td>
            <td class="column3 style42 s style43" colspan="3">طراز المركبة/</td>
            <td class="column6 style16 f style15" colspan="3">0</td>
            <td class="column9 style36 s style37" colspan="3">ماركة المركبة /</td>
            <td class="column12 style16 null style15" colspan="8"></td>
            <td class="column20 style15 s style17" colspan="3">اللوحة الرقمية /</td>
          </tr>
          <tr class="row19">
            <td class="column0 style44 n style45" colspan="3">4</td>
            <td class="column3 style36 s style37" colspan="3">عدد السلندرات/</td>
            <td class="column6 style44 n style45" colspan="3">5</td>
            <td class="column9 style36 s style37" colspan="3">حمولة المركبة /</td>
            <td class="column12 style16 s style15" colspan="3">سيدان</td>
            <td class="column15 style15 s style17" colspan="3">نوع الهيكل /</td>
            <td class="column18 style15 s style15" colspan="3">صالون</td>
            <td class="column21 style15 s style17" colspan="2">نوع المركبة /</td>
          </tr>
          <tr class="row20">
            <td class="column0 style46 null style33" colspan="12"></td>
            <td class="column12 style16 n style15" colspan="3">1525</td>
            <td class="column15 style15 s style17" colspan="3">وزن المركبة /</td>
            <td class="column18 style32 n style32" colspan="3">2021</td>
            <td class="column21 style32 s style33" colspan="2">سنة الصنع /</td>
          </tr>
          <tr class="row21">
            <td class="column0 style47 s style15" colspan="5">---------------------</td>
            <td class="column5 style15 s style17" colspan="3">عدد المحاور /</td>
            <td class="column8 style47 f style15" colspan="5">=[1]Registration!AP38</td>
            <td class="column13 style15 s style17" colspan="3">اللون الاخر /</td>
            <td class="column16 style16 s style15" colspan="5">أبيض</td>
            <td class="column21 style15 s style17" colspan="2">اللون الرئيسي /</td>
          </tr>
          <tr class="row22">
            <td class="column0 style48 s style50" colspan="20">JTNB29HK0L3087300</td>
            <td class="column20 style51 s style53" colspan="3">رقم الهيكل /</td>
          </tr>
          <tr class="row23">
            <td class="column0 style54 null style54" colspan="5"></td>
            <td class="column5 style54 s style54" colspan="3">التوقيع /</td>
            <td class="column8 style55 null"></td>
            <td class="column9 style54 null style54" colspan="12"></td>
            <td class="column21 style54 s style54" colspan="2">مقدم الطلب /</td>
          </tr>
          <tr class="row24">
            <td class="column0 style54 null style54" colspan="20"></td>
            <td class="column20 style54 s style54" colspan="3">قام بتدقيق الطلب /</td>
          </tr>
          <tr class="row25">
            <td class="column0 style54 null style54" colspan="5"></td>
            <td class="column5 style54 s style54" colspan="3">التوقيع /</td>
            <td class="column8 style54 null style54" colspan="5"></td>
            <td class="column13 style54 s style54" colspan="3">رتبه /</td>
            <td class="column16 style54 null style54" colspan="5"></td>
            <td class="column21 style54 s style54" colspan="2">رقمه /</td>
          </tr>
          <tr class="row26">
            <td class="column0 style56 null"></td>
            <td class="column1 style56 null"></td>
            <td class="column2 style56 null"></td>
            <td class="column3 style56 null"></td>
            <td class="column4 style56 null"></td>
            <td class="column5 style56 null"></td>
            <td class="column6 style56 null"></td>
            <td class="column7 style56 null"></td>
            <td class="column8 style56 null"></td>
            <td class="column9 style56 null"></td>
            <td class="column10 style56 null"></td>
            <td class="column11 style56 null"></td>
            <td class="column12 style56 null"></td>
            <td class="column13 style56 null"></td>
            <td class="column14 style56 null"></td>
            <td class="column15 style56 null"></td>
            <td class="column16 style56 null"></td>
            <td class="column17 style56 null"></td>
            <td class="column18 style56 null"></td>
            <td class="column19 style56 null"></td>
            <td class="column20 style56 null"></td>
            <td class="column21 style56 null"></td>
            <td class="column22 style56 null"></td>
          </tr>
        </tbody>
    </table>
  </body>
</html>
<button onclick="window.print();">Print this Page</button>
