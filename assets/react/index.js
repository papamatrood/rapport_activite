import React from "react";
import { createRoot } from "react-dom/client";
import { BrowserRouter, Link, Route, Routes } from "react-router-dom";
import ListeRapport from "./pages/listeRapport";

const rootID = document.getElementById('root');
const root = createRoot(rootID);

root.render(
    <BrowserRouter>
        <nav className="navbar navbar-expand-lg navbar-dark bg-info text-white mb-5">
            <div className="container-fluid">
                <Link to="/" className="navbar-brand mt-2 mt-lg-0">
                    Afribone
                    {/* <img src="/img/logo.png" alt="Logo Afribone" height="75" loading="lazy" /> */}
                </Link>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                        <li className="nav-item">
                            <Link to="/rapport" className="nav-link" >Rapport d'activité</Link>
                        </li>
                        <li className="nav-item dropdown">
                            <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Utilisateur
                            </a>
                            <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><Link to="/" className="dropdown-item">Profile</Link></li>
                                <li>
                                    <hr className="dropdown-divider" />
                                </li>
                                <li> <Link to="/" className="dropdown-item" href="">Utilisateur</Link></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                {/* <div className="d-flex align-items-center">
                    <span className="font-weight-bold me-5">{{ app.user.firstname }} - {{ app.user.lastname }}</span>
                    <a href="" className="btn btn-sm btn-outline-primary">Se déconnecter</a>
                </div> */}
            </div>
        </nav>
        <Routes>
            <Route path="/" element={<ListeRapport />} />
            <Route path="/rapport" element={<ListeRapport />} />
        </Routes>
    </BrowserRouter>
);