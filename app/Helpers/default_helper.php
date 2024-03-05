<?php

function layout($page, $data = array())
{
  echo view('layout/header');
  echo view('layout/nav', $data);
  echo view('pages/' . $page, $data);
  echo view('layout/bottom');
}

function login_layout($page, $data = array())
{
  echo view('layout/header');
  echo view('login/' . $page, $data);
  echo view('layout/bottom');
}