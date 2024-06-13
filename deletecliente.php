<?php

include "config.php";
$id_cliente = $_GET['id'] ?? '';
$sqlDeleteCliente = "DELETE FROM cliente WHERE id_cliente = $id_cliente";
$result = mysqli_query($conn, $sqlDeleteCliente);


header("Location: http://localhost/bytemanager/cliente.php");
exit();

?>

C:\Users\Lucas\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Spotify.lnk

"C:\Program Files\Google\Chrome\Application\chrome.exe
C:\ProgramData\Microsoft\Windows\Start Menu\Programs\chrome.exe

<?xml version="1.0" encoding="utf-8"?>
<LayoutModificationTemplate
    xmlns="http://schemas.microsoft.com/Start/2014/LayoutModification"
    xmlns:defaultlayout="http://schemas.microsoft.com/Start/2014/FullDefaultLayout"
    xmlns:start="http://schemas.microsoft.com/Start/2014/StartLayout"
    xmlns:taskbar="http://schemas.microsoft.com/Start/2014/TaskbarLayout"
    Version="1">
  <LayoutOptions StartTileGroupCellWidth="6" StartTileGroupsColumnCount="1" />
  <DefaultLayoutOverride LayoutCustomizationRestrictionType="OnlySpecifiedGroups">

<CustomTaskbarLayoutCollection PinListPlacement="Replace">
      <defaultlayout:TaskbarLayout>
        <taskbar:TaskbarPinList>
          <taskbar:UWA AppUserModelID="Microsoft.MicrosoftEdge_8wekyb3d8bbwe!MicrosoftEdge" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%PROGRAMFILES%\Google\Chrome\Application\chrome.exe" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%APPDATA%\Microsoft\Windows\Start Menu\Programs\System Tools\File Explorer.lnk" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%APPDATA%\Microsoft\Windows\Start Menu\Programs\Spotify.lnk" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%PROGRAMFILES%\Microsoft Office\root\Office16\OUTLOOK.EXE" />
           <taskbar:DesktopApp DesktopApplicationLinkPath="%PROGRAMFILES%\Microsoft Office\root\Office16\WINWORD.EXE" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%PROGRAMFILES%\Microsoft Office\root\Office16\EXCEL.EXE" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%PROGRAMFILES%\Microsoft Office\root\Office16\POWERPNT.EXE" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%APPDATA%\Microsoft\Windows\Start Menu\Programs\Windows Powershell\Windows Powershell ISE.lnk" />
          <taskbar:DesktopApp DesktopApplicationLinkPath="%ALLUSERSPROFILE%\Microsoft\Windows\Start Menu\Programs\Accessories\Paint.lnk" />          
        </taskbar:TaskbarPinList>
      </defaultlayout:TaskbarLayout>
    </CustomTaskbarLayoutCollection>
</LayoutModificationTemplate>