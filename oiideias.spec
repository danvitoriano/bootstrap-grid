Name:		oiideias
Version:	1.0
Release:	6
Summary: 	Oi Ideias
Group:		Development/Files
License:	Non free
URL:		http://oiideias.oi.infra/index.php
Source0:	oiideias-1.0.6.tar.gz
Packager: 	Danilo Vitoriano <danilo.vitoriano@oi.net.br>
BuildRoot:	%{_topdir}/%{_tmppath}/%{name}-%{version}-%{release}
BuildArch:	noarch

%description
Oi Ideias - Envie sugestões de ideias

%prep
%setup -c -n %{name}.%{version}

%build

%install
rm -rf %{buildroot}
mkdir -p %{buildroot}/var/www/oiideias.oi.infra
cp -Rip %{_builddir}/%{name}.%{version}/* %{buildroot}/var/www/oiideias.oi.infra/

%clean
rm -rf %{buildroot}

%files
%defattr(-,apache,apache,-)
%dir
/var/www/oiideias.oi.infra

%changelog
* Tue Sep 20 2016 - danilo.vitoriano@oi.net.br
- [1.0.6] Change email sender subject
* Fri Sep 16 2016 - danilo.vitoriano@oi.net.br
- [1.0.5] Add new categories, change send mails, replace charset
* Thu Sep 15 2016 - danilo.vitoriano@oi.net.br
- [1.0.4] Include samplemail
* Wed Sep 14 2016 - danilo.vitoriano@oi.net.br
- [1.0.3] Change email receiver and category position
* Thu Sep 08 2016 - danilo.vitoriano@oi.net.br
- [1.0.2] Change mail to Gmail account
* Mon Sep 05 2016 - danilo.vitoriano@oi.net.br
- [1.0.1] First package
