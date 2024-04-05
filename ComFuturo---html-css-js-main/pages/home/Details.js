const [exibirConteudo, setExibirConteudo] = useState({});

    const alternarExibicao = (index) => {
      setExibirConteudo((prevState) => ({
        ...prevState,
        [index]: !prevState[index]
      }));
    };