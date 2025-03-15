function ValidateSnumber(thisform)
{
with (thisform)
  {
  if (validate_required(sn," Serial number  can not be  empty!")==false)
  {sn.focus();return false;}
  }
}












